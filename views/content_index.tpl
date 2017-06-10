<section class="s-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Контент главной страницы (content_index)</h3>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem beatae consequatur excepturi,
                illum ipsam molestiae nesciunt numquam quis similique! Adipisci aut, autem deserunt et explicabo
                fuga perspiciatis repudiandae sed ullam.
            </div>
        </div>
    </div>
</section>

<section class="s-body">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                gfhdfgdfgfd gfd gdfgd8g7834ujg98fjer fdjg iodfj giodfg
            </div>
        </div>
    </div>
</section>

<section class="s-products">
    <div class="container">
        <div class="row">
            <h2>Товары</h2>
            <?php foreach($this->products as $product) { ?>
                <div class="col-md-4">
                    <div class="good-block">
                        <p>Название товара: <?=$product['title']?></p>
                        <p>Артикул: <?=$product['articul']?></p>
                        <p>
                            фото товара:
                            <img class="good-block-img" src="<?=$product['path_img']?>" alt="доделать">
                        </p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>




