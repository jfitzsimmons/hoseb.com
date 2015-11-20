<!DOCTYPE HTML PUBLIC “-//W3C//DTD HTML 4.01 Transitional//EN” “http://www.w3.org/TR/html4/loose.dtd”>
<meta http-equiv=”content-type” content=”text/html; charset=utf-8″ />
<?php
    
    $str = 'firephp-core-master/lib/FirePHPCore/FirePHP.class.php';
    
    #Include the FirePHP class
    include_once($str);
    #Start buffering the output. Not required if output_buffering is set on in php.ini file
    
    #get a firePHP variable reference
    $firephp = FirePHP::getInstance(true);
    # we log today’s date as an example. you could log whatever variable you want to
    $todays_date = 'today';
    
    
    $database_username = "db125045";
    $database_password = "1qaSW@3ed";
    $database_info = "mysql:dbname=db125045_wp;host=internal-db.s125045.gridserver.com";
    try
    {
        
        $PDO = new PDO($database_info, $database_username, $database_password);
        

        function getChildrenOf($ary, $id)
        {
            foreach ($ary as $el)
            {
                if ($el['id'] == $id)
                    return $el;
            }
            return FALSE; // use false to flag no result.
        }
        
        
        
        
        $getorderitemid = "SELECT order_item_id, meta_value FROM `wp_sfswoocommerce_order_itemmeta` WHERE (exported <> 'exportquote') AND (exported <> 'exportorder') AND `meta_key` = '_product_id'";
        $statement1 = $PDO->prepare($getorderitemid);
        $getids1 = $PDO->query($getorderitemid);
        $f1 = $getids1->fetchAll();
        
        
        foreach ($f1 as $key=>$value) {
        #new big query
        $queryattr = "SELECT * FROM `wp_sfswoocommerce_order_itemmeta` WHERE (meta_key = '_product_id' AND order_item_id = ". $value[order_item_id] .") or (meta_key = '_qty' AND order_item_id = ". $value[order_item_id] .") OR (meta_key = 'pa_color' AND order_item_id = ". $value[order_item_id] .") OR (meta_key = 'pa_size' AND order_item_id = ". $value[order_item_id] .")";
        
        
        
        #shipping addy ERROR HERE???!!!
        $queryshipping = "SELECT meta_value FROM `wp_sfspostmeta` WHERE meta_key LIKE '_shipping%' AND post_id = ". $value[order_item_id] ."";
        
        $statement2 = $PDO->prepare($queryshipping);
        $statement3 = $PDO->prepare($queryattr);
        
        if (!$statement2 | !$statement3 ) {
            echo "\nPDO::errorInfo():\n";
            print_r($PDO->errorInfo());
        }
        
        $shipping = $PDO->query($queryshipping);
        $attrs = $PDO->query($queryattr);
        
        $f2 = $shipping->fetchAll();
        $f3 = $attrs->fetchAll();
        
        
        $queryprod = "SELECT * FROM `wp_sfspostmeta` WHERE `post_id` = '". $value[order_item_id] ."' AND (`meta_key` = 'scalable') OR (`meta_key` = 'shirtname') OR (`meta_key` = 'designid') ";
        
        $statement4 = $PDO->prepare($queryprod);
        $prod = $PDO->query($queryprod);
        $productlist=array();

        $f4 = $prod->fetchAll();

            echo "f4s: " . print_r($f4) . "</br>";

            foreach ($f4 as $key2=>$value2) {
                
                echo "val keys pieces: " . print_r($value2[$key2][3]) . "</br>";
                array_push($productlist, $value2[$key2][3]);
               
                #echo "piecesindy " . print_r($value2[$key][3]) . "</br>";
                
               
            }
             echo "prodlist " . print_r($productlist) . "</br>";
            #$piecesf4 = array_chunk( $f4, ceil(count($array) / 2) );
        
        #$firephp->log("F4: " . $f4, ‘String‘);
        $quantity = (int)$f3[$key][1][meta_value];
        $dtgid = (string)$f4[$key][2][meta_value];
        $color = $f3[$key][2][meta_value];
        $size = $f3[$key][3][meta_value];
        $scalable = $f4[$key][1][meta_value];
            $firephp->log($f3, ‘Array‘);
            echo "pieces " . print_r($piecesf4) . "</br>";
            echo "key " . print_r($key) . "</br>";
            echo "f4 " . print_r($f4) . "</br>";
            echo "f3 " . print_r($f3) . "</br>";
           echo "quantity " . print_r($quantity) . "</br>";
        echo "dtgid " . print_r($dtgid) . "</br>";;
           echo "color " . print_r($color) . "</br>";;
           echo "size " . print_r($size) . "</br>";;
           echo "scalabe "  . print_r($scalable) . "</br>";;
        if ($scalable = 1) {
        // Get cURL resource
        $curl = curl_init();
        // Set some options - we are passing in a useragent too here
        curl_setopt_array($curl, array(
                                       CURLOPT_RETURNTRANSFER => 1,
                                       CURLOPT_URL => 'https://api.scalablepress.com/v2/quote',
                                       CURLOPT_USERPWD => ':test_cZDtREd-ZdCqU7S8NsmBFw',
                                       CURLOPT_POST => 1,
                                       CURLOPT_POSTFIELDS => array(
                                           'type' => 'dtg',
                                           'products[0][id]' => $f4[$key][2][meta_value],
                                           'products[0][quantity]'=>$quantity,
                                           'products[0][color]'=>$f3[2][meta_value],
                                           'products[0][size]'=>$f3[3][meta_value],
                                           'address[name]'=>$f2[0][meta_value] . " " . $f2[1][meta_value],
                                           'address[address1]'=>$f2[4][meta_value],
                                           'address[city]'=>$f2[6][meta_value],
                                           'address[state]'=>$f2[7][meta_value],
                                           'address[zip]'=>$f2[8][meta_value],
                                           'designId'=>$f4[0][meta_value]
                                           )
                                       ));
        // Send the request & save response to $resp
        $resp = curl_exec($curl);
        // Close request to clear up some resources
        curl_close($curl);
            
        
        $json = json_decode($resp, true);
            if (!$json[issues]) {
                print_r('json no issues?');
                $exportupdate = "UPDATE wp_sfswoocommerce_order_itemmeta SET exported = 'exportquote' WHERE `order_item_id` = ". $value[order_item_id] ." AND `meta_key` = '_product_id'";
                $stmtex = $PDO->prepare($exportupdate);
                // execute the query
                $stmtex->execute();

            } else {
                $exportupdate = "UPDATE wp_sfswoocommerce_order_itemmeta SET exported = 'exportfailed' WHERE `order_item_id` = ". $value[order_item_id] ." AND `meta_key` = '_product_id'";
                #print_r($json);
            }
        }
          
            
        
        }
        
    }
    catch(Exception $e) {
        echo 'Exception -> ';
        var_dump($e->getMessage());
    }
    
    #USE THESE get
    #get scalable and designid:
    
    ?>

