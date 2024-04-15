<?php
require_once "connect.php";
$show = mysqli_query($connect, "SELECT * FROM `Product` inner join Category on Product.Category_id = Category.Category_id");
$show_elements = mysqli_fetch_all($show);

$query_cat = mysqli_query($connect, "SELECT * FROM Category");
$cat_result = mysqli_fetch_all($query_cat);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/product-panel_style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Barshik</title>
</head>
<body>

    <header>
       <nav class="nav-links">
            <a href="index.html" class="header-link">Main page</a>
            <a href="" class="header-link">Contacts</a>
            <a href="sign-in.php" class="header-link">Sign in</a>
            <a href="sign-up.php" class="header-link">Sign up</a>
            <a href="images/cart.png" class="header-link">
                <img src="images/cart.png" alt="Cart">
                <p class="nav-text">Cart</p>
            </a>
       </nav>
       <div class="control-panel">
            <div class="find-block"></div>
            <div class="filter-block"></div>
            <table>
                <tr>

                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Editing</th>
                    <th>Delete</th>
                </tr>
                <?php
                foreach($show_elements as $element):?>
                <form action="update.php" method="POST">
                <input name="id" type="hidden" value="<?=$element[0]?>" >
                    <tr>
                        <td><input name="name" type="text" value="<?=$element[1]?>" ></td>
                         <td> 
                        <select  class="form_card" name="category" id="">
                            <?php foreach ($cat_result as $value_2) {?>  
                            <option value="<?=$value_2[0]?>"><?=$value_2[1]?></option>  
                        <?php }?>  
                        </select>
                        </td>
                        <td><input name="price" type="text" value="<?=$element[4]?>" ></td>
                        <td><input name="desc" type="text" value="<?=$element[2]?>" ></td>
                        <td>
                        <input type="submit" value="Редактировать">
                                <img src="images/update.png" alt="">
                            </a>
                        </td>
                        
                        <td>
                            <a href="delete.php?id=<?=$element[0]?>" class="table-link">
                                <img src="images/delete.png" alt="">
                            </a>
                        </td>
                    </tr>
                </form>
                <?php endforeach;?>
            </table>
<!-- <input name="category" type="text" value="" > -->
            
        </div> 
        <form action="create.php" class="create_product" method = "POST">
            <label for="new_name">Название продукта</label>
            <input name="new_name" type="text">
            <label for="new_category">Выбор категории продукта</label>
            <select  class="form_card" name="new_category" id="">
                    <?php foreach ($cat_result as $value_2) {?>  
                    <option value="<?=$value_2[0]?>"><?=$value_2[1]?></option>  
                <?php }?>  
            </select> 
            <label for="new_price">стоимость продукта</label>
            <input name="new_price" type="number">
            <label for="new_desc">Описание продукта</label>
            <textarea name="new_desc"></textarea>
            <input type="submit" value = "Добавить продукт">
        </form>   
    </header>

    <footer>
        <div class="footer-main">
            <div class="footer-elem">
                <h2 class="footer-title">Info</h2>
                <p class="footer-desc">Contrary to popular belief, Lorem Ipsum is not simply  years old Latin.</p>
                <div class="footer-img-links-block">
                    <img src="images/facebook.png" alt="Facebook" class="footer-img-link">
                    <img src="images/inst.png" alt="Instagram" class="footer-img-link">
                    <img src="images/twitter.png" alt="Twitter" class="footer-img-link">
                    <img src="images/youtube.png" alt="youTube" class="footer-img-link">
                </div>
            </div>
            <div class="footer-elem">
                <h2 class="footer-title">Explore</h2>
                <a href="#" class="footer-link">About Us</a>
                <a href="#" class="footer-link">Survices</a>
                <a href="#" class="footer-link">Our Team</a>
                <a href="#" class="footer-link">Trendy</a>
                <a href="#" class="footer-link">Gallery</a>
            </div>
            <div class="footer-elem">
                <h2 class="footer-title">Contact Us</h2>
                <a href="#" class="footer-link">45 Tooring High SL London SA17</a>
                <a href="#" class="footer-link">018123456789</a>
                <a href="#" class="footer-link">fizz@gmail.com</a>
            </div>
        </div>
        <div class="copyright-block">
            <p class="copyright-text">
                2024 msl & krarresi. All Right Reserved
            </p>
        </div>
        
    </footer>

</body>
</html>