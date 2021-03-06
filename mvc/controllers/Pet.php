<?php
    class Pet extends Controller{
        private $petModel;
        private $postModel;
     
         
       
        function __construct(){
            $this->model('PetModel');
            $this->petModel = new PetModel();
            $this->model('PostModel');
            $this->postModel = new PostModel();
        }
        function index(){
            $_SESSION['lct'] = 2;
            if(isset($_SESSION["user"])){
                if($_SESSION["user"]['admin']){
                    $data['pet'] = $this->petModel->getAll([], []);
                    $data['main'] = 'pet/list';
                    $this->view('dashboard/index', $data);
                }
                else{
                    Header('location:' . URL);
                }
            }
            
            else{
                $_SESSION['lct'] = 2;
                $_SESSION['admin'] = 1;
                Header('location:' . URL . 'LoginAndRegister');
            }

        //     $data['main'] = 'pet/list';
        //     $data['pet'] = $this->petModel->getAll([], []);
        //  //   $data['posts'] = $this->postModel->get();
        //     $this->view('dashboard/index', $data);
        }
        function detail($id){
            $_SESSION['lct'] = 1;
            //unset($_SESSION['cart']); die();
            $data['pet'] = $this->petModel->getPet($id);
            $data['posts'] = $this->postModel->get($id);

            
            if(isset($_SESSION["cart"])){
                $data['cart'] = $_SESSION["cart"];
               
            }
            else{
                $data['cart'] =[];
            }
            $data['lct'] = $_SESSION['lct'];
            //print_r($data['cart']); die();
            $this->view('detail/index', $data);
        }
        function delete($id){
            $this->petModel->destroy($id);
            Header("Location:" . URL . 'pet');
        }
        function store(){
            if(isset($_POST['addPet'])){
                $anh = $_FILES['img1']['name'];
                if($anh != null){
                    
                    $tmp_name = $_FILES['img1']['tmp_name'];
                    $anh = $_FILES['img1']['name'];
                    $path = "./public/style/images/" . $anh;

                    move_uploaded_file($tmp_name, $path);
                        $pet = [
                            'name'=>$_POST['name'],
                            'content'=>$_POST['content'],
                            'color'=>$_POST['color'],
                            'price'=>$_POST['price'],
                            'star'=>$_POST['star'],
                            'image'=>$anh
                        ];
                        $this->petModel->add($pet);
                        Header("Location:" . URL . 'pet');
                    }
            }
            $data['main'] = 'pet/add';
            $this->view('dashboard/index', $data);
        }
        function edit($id){
            if(isset($_POST['editPet'])){
                $anh = $_FILES['img1']['name'];
                if($anh != null){
                    
                    $tmp_name = $_FILES['img1']['tmp_name'];
                    $anh = $_FILES['img1']['name'];
                    $path = "./public/style/images/" . $anh;

                    move_uploaded_file($tmp_name, $path);
                        $pet = [
                            'name'=>$_POST['name'],
                            'content'=>$_POST['content'],
                            'color'=>$_POST['color'],
                            'price'=>$_POST['price'],
                            'star'=>$_POST['star'],
                            'image'=>$anh
                        ];
                        
                }
                else{
                    $pet = [
                        'name'=>$_POST['name'],
                        'content'=>$_POST['content'],
                        'color'=>$_POST['color'],
                        'price'=>$_POST['price'],
                        'star'=>$_POST['star']
                    ];
                }

                $this->petModel->update($id ,$pet);
                Header("Location:" . URL . 'pet');
            }
            $data['main'] = 'pet/edit';
            $data['pet'] = $this->petModel->getPet($id);
           // $data['posts'] = $this->postModel->get();
            $this->view('dashboard/index', $data);
            
        }
        function addcart($id){
            $pet = $this->petModel->getPet($id);
            if(empty($_SESSION['cart']) || !array_key_exists($id, $_SESSION['cart'])){
                $pet['count'] = 1;
            }
            else{
                $pet['count'] = $_SESSION['cart'][$id]['count'] + 1;
            }
            $_SESSION['cart'][$id] = $pet;
            
        }

        function deletecart($id){
            unset($_SESSION['cart'][$id]);
            if($_SESSION['lct'] == 1){
                header("location:" . URL . 'pet/detail/' . $id);
            }
            else if($_SESSION['lct'] == 0){
                header("location:" . URL);
            }
        }

        function delallcart(){
            unset($_SESSION['cart']);
            header("location:" . URL);
        }

        function updatecart($id){
            $value = $_POST['value'];
            $_SESSION['cart'][$id]['count'] = $value;
        }

        function payment(){
            // $_SESSION['lct'] = 5;
            // $_SESSION['payment'] = 1;
            // //if(isset($_SESSION['user'])){
                $data['customer'] = $_SESSION['user'];
                $data['cart'] = $_SESSION['cart'];
                $this->view('payment/payment', $data);
            // }
            // else{
            //     Header('location:' . URL . 'LoginAndRegister');
            // }
            
        }

    }
?>