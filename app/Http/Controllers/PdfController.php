<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Order;

class PdfController extends Controller
{
    public function voir_pdf($id){

        Session::put('id', $id);

        try{
            $pdf = \App::make('dompdf.wrapper')->setPaper('a4', 'landscape');
            $pdf->loadHTML($this->convert_orders_data_to_html());

            return $pdf->stream();
        }
        catch(\ Exception $e){
           return redirect('/commandes')->with('error' , $e->getMessage()) ;
        }
    }

    public function convert_orders_data_to_html(){
      
        $orders = Order::where('id',Session::get('id'))->get();

        foreach($orders as $order){
            $nom = $order->nom;
            $adresse = $order->adresse;
            $date = $order->created_at;
        }

        $orders->transform(function($order, $key){
            $order->panier = unserialize($order->panier);

            return $order;
        });

        $output = '<link rel="stylesheet" href="css/style.css">
                        <table class="table">
                            <thead class="thead">
                                <tr class="text-left">
                                    <th>Client Name : '.$nom.'<br> Client Address : '.$adresse.' <br> Date : '.$date.'</th>
                                </tr>
                            </thead>
                        </table>
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>Image</th>
                                    <th>Product name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>';
        
        foreach($orders as $order){
            foreach($order->panier->items as $item){

                $output .= '<tr class="text-center">
                                // <td class="image-prod"><img src="storage/product_images/'.$item['product_image'].'" alt="" style = "height: 80px; width: 80px;"></td>
                                <td class="product-name">
                                    <h3>'.$item['product_name'].'</h3>
                                </td>
                                <td class="price"> '.$item['product_price'].' DA</td>
                                <td class="qty">'.$item['qty'].'</td>
                                <td class="total"> '.$item['product_price']*$item['qty'].' DA</td>
                            </tr><!-- END TR-->
                            </tbody>';

            }

            $totalPrice = $order->panier->totalPrice; 

        }

        $output .='</table>';

        $output .='<table class="table">
                        <thead class="thead">
                            <tr class="text-center">
                                    <th>Total</th>
                                    <th> '.$totalPrice.' DA</th>
                            </tr>
                        </thead>
                    </table>';


        return $output;
                
    

    }
}


