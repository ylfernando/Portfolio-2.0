<?php
require './config.php';

class Projeto {
    public function addProjeto($empresa, $url) {
        global $pdo;
        $sql = $pdo -> prepare("INSERT INTO projeto SET nome_empresa = :nome_empresa, url_empresa = :url_empresa, id_usuario = :id_usuario");
        $sql -> bindValue(":nome_empresa", $empresa);
        $sql -> bindValue(":url_empresa", $url);
        $sql -> bindValue(":id_usuario", $_SESSION['login']);
        $sql -> execute();
    }

    public function addImagemProjeto($id, $imagem) {
        global $pdo;

        if(count($imagem) > 0) {
            //Faz a contagem para ver se enviou alguma coisa além do array
            for($q = 0; $q < count($imagem['tmp_name']); $q++) {
                $tipo = $imagem['type'][$q];
                //Verifica o tipo da imagem
                if(in_array($tipo, array('image/jpeg', 'image/png'))) {
                    $tmp_name = md5(time().rand(0, 9999)).'.jpg';
                    move_uploaded_file($imagem['tmp_name'][$q], 'Assets/Images/Projetos/Upload/'.$tmp_name);

                    $width = 200;
                    $height = 200;

                    list($width_orig, $height_orig) = getimagesize('Assets/Images/Projetos/Upload/'.$tmp_name);

                    $finalWidth = 0;
                    $finalHeight = 0;

                    $ratio = $width_orig / $height_orig;
                    $ratioDest = $width / $height;
                    
                    if($ratioDest > $ratio) {
                        $finalWidth = $height * $ratio;
                        $finalHeight = $height;
                    } else {
                        $finalHeight = $finalWidth / $ratio;
                        $finalWidth = $width;
                    }

                    $img = imagecreatetruecolor($finalWidth, $finalHeight);
                    if($tipo == 'image/jpeg') {
                        $origi = imagecreatefromjpeg('Assets/Images/Projetos/Upload/'.$tmp_name);
                    } else if($tipo == 'image/png') {
                        $origi = imagecreatefrompng('Assets/Images/Projetos/Upload/'.$tmp_name);
                    }

                    imagecopyresampled($img,
                    $origi,
                    0,0,0,0,
                    $finalWidth,
                    $finalHeight,
                    $width_orig,
                    $height_orig);
                    imagejpeg($img, 'Assets/Images/Projetos/Upload/'.$tmp_name, 100);

                    $sql = $pdo -> prepare("INSERT INTO projeto_imagem SET id_projeto = :id_projeto, url = :url");
                    $sql -> bindValue(":id_projeto", $id);
                    $sql -> bindValue(":url", $tmp_name);
                    $sql -> execute();
                }
            }
        }//Fim da imagem
    }

    public function editarProjeto($empresa, $url, $id, $logo) {
        global $pdo;

        $sql = $pdo -> prepare("UPDATE projeto SET nome_empresa = :nome_empresa, url_empresa = :url_empresa, id_usuario = :id_usuario WHERE id = :id");
        $sql -> bindValue(":nome_empresa", $empresa);
        $sql -> bindValue(":url_empresa", $url);
        $sql -> bindValue(":id_usuario", $_SESSION['login']);
        $sql -> bindValue(":id", $id);
        $sql -> execute();

        if(count($logo) > 0) {
            //Faz a contagem para ver se enviou alguma coisa além do array
            for($q = 0; $q < count($logo['tmp_name']); $q++) {
                $tipo = $logo['type'][$q];
                //Verifica o tipo da imagem
                if(in_array($tipo, array('image/jpeg', 'image/png'))) {
                    $tmp_name = md5(time().rand(0, 9999)).'.jpg';
                    move_uploaded_file($logo['tmp_name'][$q], 'Assets/Images/Projetos/Upload/'.$tmp_name);

                    $width = 200;
                    $height = 200;

                    list($width_orig, $height_orig) = getimagesize('Assets/Images/Projetos/Upload/'.$tmp_name);

                    $finalWidth = 0;
                    $finalHeight = 0;

                    $ratio = $width_orig / $height_orig;
                    $ratioDest = $width / $height;
                    
                    if($ratioDest > $ratio) {
                        $finalWidth = $height * $ratio;
                        $finalHeight = $height;
                    } else {
                        $finalHeight = $finalWidth / $ratio;
                        $finalWidth = $width;
                    }

                    $img = imagecreatetruecolor($finalWidth, $finalHeight);
                    if($tipo == 'image/jpeg') {
                        $origi = imagecreatefromjpeg('Assets/Images/Projetos/Upload/'.$tmp_name);
                    } else if($tipo == 'image/png') {
                        $origi = imagecreatefrompng('Assets/Images/Projetos/Upload/'.$tmp_name);
                    }

                    imagecopyresampled($img,
                    $origi,
                    0,0,0,0,
                    $finalWidth,
                    $finalHeight,
                    $width_orig,
                    $height_orig);
                    imagejpeg($img, 'Assets/Images/Projetos/Upload/'.$tmp_name, 100);

                    $sql = $pdo -> prepare("INSERT INTO projeto_imagem SET id_projeto = :id_projeto, url = :url");
                    $sql -> bindValue(":id_projeto", $id);
                    $sql -> bindValue(":url", $tmp_name);
                    $sql -> execute();
                }
            }
        }//Fim da imagem
    }

    public function getProjetos() {
        global $pdo;

        $array = [];
        $sql = $pdo -> prepare("SELECT * FROM projeto");
        $sql -> execute();

        if($sql -> rowCount() > 0) {
            $array = $sql -> fetchAll();
        }
        return $array;
    }

    public function getProjeto($id) {
        global $pdo;
        $array = [];
        $sql = $pdo -> prepare("SELECT * FROM projeto WHERE id = :id");
        $sql -> bindValue(":id", $id);
        $sql -> execute();

        if($sql -> rowCount() > 0) {
            $array = $sql -> fetch();
        }
        return $array;
    }

    public function getImagemProjeto() {
        global $pdo;
        $array = [];

        $sql = $pdo -> prepare("SELECT *, (select projeto_imagem.url from projeto_imagem where projeto_imagem.id_projeto = projeto.id limit 1) as url
            FROM projeto
            WHERE id_usuario = :id_usuario");
        $sql -> bindValue(":id_usuario", $_SESSION['login']);
        $sql -> execute();

        if($sql -> rowCount() > 0) {
            $array = $sql -> fetchAll();
        }
        return $array;
    }
}