<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php include ('left_menu.tpl'); ?>
        </div>
        <div class="col-md-9">
            <section class="s-product">
                <div class="good-block-current">
                    <h2><?=$this->product['title']?></h2>
                    <p>Артикул: <?=$this->product['articul']?></p>
                    <p>Тип: <?=$this->product['category']?></p>
                    <p><?=$this->product['short_desc']?></p>
                    <p>Цена: <?=$this->product['price']?></p>
                    <p>
                        фото товара:
                        <img class="good-block-img" src="<?=$this->product['path_img']?>" alt="<?=$this->product['title']?>">
                    </p>
                </div>
            </section>
        </div>
    </div>
</div>