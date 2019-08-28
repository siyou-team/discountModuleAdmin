<?php if (!defined('ROOT_PATH')) exit('No Permission');
/**
 * @author     windfnn
 */
class Discount_TypeCtl extends AdminController
{
    public $discountTypeModel = null;
	public $store_id = null;

    /**
     * Constructor
     *
     * @param  string $ctl 控制器目录
     * @param  string $met 控制器方法
     * @param  string $typ 返回数据类型
     * @access public
     */
    public function __construct(&$ctl, $met, $typ)
    {
        parent::__construct($ctl, $met, $typ);

        $this->discountTypeModel = Discount_TypeModel::getInstance();
		$this->store_id = Zero_Perm::$storeId;
    }
	
	
    /**
     * 首页
     * 
     * @access public
     */
    public function index()
    {
		$this->render('default');
    }
    
    /**
     * 管理界面
     * 
     * @access public
     */
	public function manage()
	{
		$this->render('manage');
	}
	
    public function lists()
    {
        $user_id = Zero_Perm::getUserId();

        $page = i('page', 1);  //当前页码
        $rows = i('rows', 10); //每页记录条数
        $sort = grid_sort();

        $column_row = array();

        //权限判断
        $user_id = Zero_Perm::getUserId();
		$data = $this->discountTypeModel->getLists();
        
        $this->render('default', $data);
    }
	
	public function add()
	{
		$field = array();
			$field['description'] = s('description'); 
		$field['status'] = s('status'); 
		
		$this->discountTypeModel->sql->startTransactionDb();
		$flag = $this->discountTypeModel->add($field,true);
		
		if ($flag && $this->discountTypeModel->sql->commitDb())
		{
			$msg = __('操作成功');
			$status = 200;
		}
		else
		{
			$this->discountTypeModel->sql->rollBackDb();
			$msg = __('操作失败');
			$status = 250;
		}
		
		$data = array();
		$data = $field;
		$data['id'] = $flag;
		$this->render('default', $data, $msg, $status);
	}
	
	public function edit()
	{
		$id = i('id');
			$field['description'] = s('description'); 
		$field['status'] = s('status'); 
		
		$this->discountTypeModel->sql->startTransactionDb();
		$flag = $this->discountTypeModel->edit($id,$field);
		
		if ($flag && $this->discountTypeModel->sql->commitDb())
		{
			$msg = __('操作成功');
			$status = 200;
		}
		else
		{
			$this->discountTypeModel->sql->rollBackDb();
			$msg = __('操作失败');
			$status = 250;
		}
		
		$data = array();
		$data = $field;
		$data['id'] = $id;
		$this->render('default', $data, $msg, $status);
	}
	
	public function remove()
	{
		$id = i('id');
		$data = $this->discountTypeModel->getOne($id);
		if(!empty($data) && $data['store_id'] == $this->store_id)
		{
			$flag = $this->discountTypeModel->remove($id);
			if ($flag !== false)
			{
				$msg = __('操作成功');
				$status = 200;
			}
			else
			{
				$msg = __('操作失败');
				$status = 250;
			}
		}else{
			$msg = __('数据不存在');
			$status = 250;
		}
		
        $data['id'] = $id;
        $this->render('default', $data, $msg, $status);
	}
}
?>