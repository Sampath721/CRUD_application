<?php

namespace App\Controllers;
use App\Models\Userdata;

class Home extends BaseController
{
    public function index()
    {
        return view('theme/index');
    }


    public function updatedata($ID)
    {
       
        $userdata=new Userdata();
        $data['employee'] = $userdata->find($ID);
        return view('theme/updatedata.php',$data);
       
    }


    public function viewdata(){
        $fetchdata=new Userdata();
        $data['employee']=$fetchdata->findAll();
        return view('theme/viewdata',$data);
    }


    public function insert(){
        $userdata=new Userdata();
        $data=[
            'FirstName' => $this->request->getPost('FirstName'),
            'LastName' => $this->request->getPost('LastName'),
            'email' => $this->request->getPost('email'),
            'phone'=>$this->request->getPost('phnumber')

        ];
        $userdata->save($data);
        return redirect()->to(base_url(''))->with('status','Added succesfully');
    }

    public function delete($ID){
        $userdata=new Userdata();
       
        $userdata->delete($ID);
        return redirect()->to(base_url('/viewdata'))->with('status','Deleted succesfully');
        
    }


    public function edit($ID){
        $userdata=new Userdata();
        $data['employee'] = $userdata->find($ID);
        return view('theme/updatedata.php',$data);
    }


    public function updateuser($ID){
        $userdata=new Userdata();
        $id= $this->request->getVar('ID');
        $data=[
            'FirstName' => $this->request->getPost('FirstName'),
            'LastName' => $this->request->getPost('LastName'),
            'email' => $this->request->getPost('email'),
            'phone'=>$this->request->getPost('phnumber')

        ];
        $userdata->update($ID,$data);
        return redirect()->to(base_url('/viewdata'))->with('status','Updated succesfully');


    }


    public function DataByEmail(){
        $fetchdata=new Userdata();
        $email=$this->request->getPost('uemail');
        /*$valueofemail=$fetchdata->sqlquery("SELECT * FROM userdata WHERE email= '".$email."'");*/
        $data['employee'] = $fetchdata->findAll();
        return view('theme/getDataByEmail',$data);
       
    }
}
