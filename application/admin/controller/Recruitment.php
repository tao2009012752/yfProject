<?php
namespace app\admin\controller;

use think\session;
use think\Request;
use think\Db;

/**
 * 首页
 *
 * @author mersycle<mersycle@hotmail.com>
 */
class Recruitment extends Common
{
    private $_tableName = 'jobs';
    public function index ()
    {
        $where = [];
        $where['is_delete'] = 0;

        $count = Db::name($this->_tableName)
            ->where($where)
            ->count();
        $list = Db::name($this->_tableName)
            ->where($where)
            ->paginate(20);

        //将对象转换成数组
        $list_array = $list->all();

        if(!empty($list_array)){
            foreach($list_array as $key=>$val){
                $list_array[$key]['company_name'] = Db::name('company')->where('company_id',$val['company_id'])->value('company_name');
                if($val['sex'] == '1'){
                    $list_array[$key]['sex_value'] = '男';
                }else if($val['sex'] == '2'){
                    $list_array[$key]['sex_value'] = '女';
                }else{
                    $list_array[$key]['sex_value'] = '不限';
                }
            }
        }


        $this->assign('count', $count);
        $this->assign('list', $list);
        $this->assign('list_array', $list_array);


        return $this->fetch();
    }


    //查看职位详情
    public function viewDetail(){
        $jobId = (int) Request::instance()->param('job_id');

        if (!$jobId || !$jobInfo = Db::name($this->_tableName)
                ->where(['job_id' => $jobId])
                ->find()
        ) {
            $this->error('用户不存在#');
        }


        if($jobInfo['sex'] == '1'){
            $jobInfo['sex_value'] = '男';
        }else if($jobInfo['sex'] == '2'){
            $jobInfo['sex_value'] = '女';
        }else{
            $jobInfo['sex_value'] = '不限';
        }

        $jobInfo['company_name'] = Db::name('company')->where('company_id',$jobInfo['company_id'])->value('company_name');

        $this->assign('detail', $jobInfo);
        return $this->fetch();
    }

    public function delete ()
    {
        $_POST['table_name'] = $this->_tableName;
        $ret = parent::softDelete();
        ajax_return($ret);
    }

    public function deleteSome ()
    {
        $_POST['table_name'] = $this->_tableName;
        $ret = parent::softDeletes();
        ajax_return($ret);
    }


}