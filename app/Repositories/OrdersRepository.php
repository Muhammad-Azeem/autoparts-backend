<?php

namespace App\Repositories;

use App\Models\order;
use App\Models\orderItem;
use Stripe\Exception\CardException;
use Stripe\Stripe;

class OrdersRepository
{
    protected $model;


    public function __construct(order $model = null)
    {
        $this->model = $model;
    }

    public function find($id){
        return $this->model->find($id);
    }

    public function create($request){

        $token = json_decode($request['token'], true);

        try {
            // Set your Stripe secret key
            Stripe::setApiKey(config('services.stripe.secret'));

            // Create a charge
            $charge = \Stripe\Charge::create([
                'amount' => 1000 * $request['sub_total'], // Amount in cents
                'currency' => 'usd',
                'description' => 'Example charge',
                'source' => $token,
            ]);
            $order = new order();
            $user = json_decode($request['user'], true);
            if(isset($user)){
                $order->user_id = $user['id'];
            }
            $order->sub_total = $request['sub_total'];
            $order->shipment_cost = 0;
            $order->total = $request['sub_total'];
            $order->country = 'Pakistan';
            $order->first_name = $request['first_name'];
            $order->last_name = $request['last_name'];
            $order->company = $request['company'];
            $order->street = $request['street'];
            $order->appartment = $request['appartment'];
            $order->zip_code = $request['zip_code'];
            $order->phone = $request['phone'];
            $order->save();
            $cartArray = json_decode($request['cart'], true);

            foreach ($cartArray as $item){
                $orderItem = new orderItem();
                $orderItem->product_id = $item['id'];
                $orderItem->quantity = $item['quantity'];
                $orderItem->price = $item['price'];
                $orderItem->order_id = $order->id;
                $orderItem->save();
            }

            return response()->json(['success' => true, 'data' => $order]);
        } catch (CardException $e) {
            // Handle card errors
            return response()->json(['error' => $e->getMessage()], 422);
        } catch (\Exception $e) {
            // Handle other errors
            return response()->json(['error' => $e->getMessage()], 500);
        }


    }

    public function update($id, $data){
        $this->model->find($id)->update($data->all());
        return $this->model->find($id);
    }

    public function delete($id){
        return $this->model->find($id)->delete();
    }
    public function getByUserId($id){
        return $this->model->where('user_id', $id)->with('user')->get();
    }
}
