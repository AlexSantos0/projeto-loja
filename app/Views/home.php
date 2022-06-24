<div class="container">
        <h1>Produtos em estoque</h1>
        <div class="row">
            <form action="pagamentos" method="get">
                <div class="ajuste container-fluid col-12">
                    <?php foreach($produto as $produto): ?>
                        <div class="cards col-md-4 col-sm-12">
                            <div class="produto card">
                                <div class="card-img">
                                    <img src="<?php echo $produto['img']?>" alt="">
                                </div>
                                <div class="card-dados">
                                    <h3><?php echo $produto['name']?></h3>
                                    <p><?php echo $produto['description']?></p>
                                    <h4>
                                        <?php 
                                        $valor = $produto['amout']/100;
                                        $valorRS = number_format($valor, 2, ',','');
                                        echo "R$ ".$valorRS; 
                                        ?>
                                    </h4>
                                </div>
                            </div>
                            
                            <input id="check<?php echo $produto['id'] ?>" type="checkbox" name="produtoid[<?php echo $produto['id']?>]" value="<?php echo $produto['id']?>">
                            
                        </div>
                    <?php endforeach; ?>
                 </div> 
                <button class="btn-primary col-2 mt-3 mb-5" type="submit">Comprar</button>
                
            </form> 
        </div>
</div>





