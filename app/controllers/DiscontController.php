<?php
namespace App\Controllers;

use App\Models\Discont;

class DiscontController extends AdminController
{
    public function index()
    {
        $disconts = Discont::findAll();
        $this->render("discont/index", ["disconts" => $disconts]);
    }

    public function add()
    {
        $this->render("discont/add");
    }

    public function create()
    {
        $this->validation();
        $discont = Discont::table()->create();
        $discont->set($_POST);
        $result = $discont->save();
        $this->addMessageKey($result, "add_discont");
        $this->redirect("admin/disconts");
    }

    private function validation()
    {
        $v = new \Valitron\Validator($_POST);
        $v->rule('required', ['code', 'value', 'date']);
        $v->rule('lengthBetween', 'code', 5, 7);
        $v->rule('date', 'date');
        if($v->validate()) return;
        $this->addMessageText(false, $v->errors())->back();
    }

    public function delete($id)
    {
        $result = Discont::findOne($id)->delete();
        $this->addMessageKey($result, "delete_discont")->back();
    }

    public function edit($id)
    {
        $discont = Discont::findOne($id);
        $this->render("discont/edit", ["discont" => $discont]);
    }

    public function update()
    {
        $this->validation();
        $discont = Discont::findOne($_POST["id"]);
        $discont->set($_POST);
        $result = $discont->save();
        $this->addMessageKey($result, "update_discont");
        $result ? $this->redirect("admin/disconts") : $this->back();
    }
}