<?phpclass modelAction extends HomeAction {        public function index() {        $M=M("model");                $model = $M->limit(0,10)->order("id desc")->select();        $this->assign('model', $model);        $this->display();    }    public function mList() {        $M=M("model");        $map['id']=$_GET['id'];        $model = $M->field("id,title,picList,intro")->where($map)->find();        $model['picList']=explode(",",$model['picList']);        $model['intro']=explode("||",$model['intro']);        $modelList="";        for($i=0;$i<count($model['picList']);$i++){            $pic=str_replace("m_","",$model['picList'][$i]);            $modelList.=$modelList==""?'{"img":"'.$pic.'","txt":"'.$model['intro'][$i].'"}':",".'{"img":"'.$pic.'","txt":"'.$model['intro'][$i].'"}';        }        $this->assign('modelList', $modelList);        $this->assign('model', $model);        $this->display("list");    }}?>