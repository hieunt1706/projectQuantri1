<?php
    class Dashboard extends Controller{
        private $userModel;
        private $petModel;
        private $billModel;
        function __construct(){
            $this->model('UserModel');
            $this->userModel = new UserModel();
            $this->model('PetModel');
            $this->petModel = new PetModel();
            $this->model('BillModel');
            $this->billModel = new BillModel();

        }
        function index(){
            $_SESSION['lct'] = 2;
            if(isset($_SESSION["user"])){
                $data['pet'] = $this->petModel->getAll([], []);
                $data['user'] = $this->userModel->getAll([], []);
                $data['bill'] = $this->billModel->getAll([], []);
                $data['main'] = 'card/card';
                //$data['product'] = $this->productModel->getAll([], []);
                $this->view('dashboard/index', $data);
            }
            else{
                $_SESSION['lct'] = 2;
                $_SESSION['admin'] = 1;
                Header('location:' . URL . 'LoginAndRegister');
            }
        }
        function deletebill($id){
            $this->billModel->destroy($id);
            Header("Location:" . URL . 'dashboard');
        }

        function store(){
            if(isset($_POST['addBill'])){
                $bill = [
                    'user'=>$_POST['user'],
                    'date'=>$_POST['date'],
                    'totalprice'=>$_POST['totalprice']
                ];
                $this->billModel->add($bill);
                Header("Location:" . URL . 'dashboard');
            }


            $data['main'] = 'card/add';
            $this->view('dashboard/index', $data);
        }

        function editbill($id){
            if(isset($_POST['editBill'])){
                $bill = [
                    'user'=>$_POST['user'],
                    'date'=>$_POST['date'],
                    'totalprice'=>$_POST['totalprice']
                ];
                $this->billModel->add($bill);
                Header("Location:" . URL . 'dashboard');
            }

            $data['main'] = 'card/edit';
            $data['bill'] = $this->billModel->getBill($id);
            $this->view('dashboard/index', $data);
        }
    }
?>