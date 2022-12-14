<?php

namespace App\Libraries;

/*
* this library for online payment i`m used here IYZICO library, for more info :
* https://dev.iyzipay.com/tr/odeme-formu/odeme-formu-baslatma
*/

class Iyzico
{
    // options Iicinde config ayarlar yerlestircegim
    protected $options;
    protected $request;
    protected $basketItems;

    public function __construct()
    {
        $this->basketItems = [];
        // config olusturma
        // move key and pass to .env
        $this->options = new \Iyzipay\Options();
        $this->options->setApiKey("sandbox-1xftuqE96bBYPLQjKS864fxV8ePNpfM1");
        $this->options->setSecretKey("sandbox-q1s0fII2pKXMaQ3mm0xSq7zz9Dj0wPG8");
        $this->options->setBaseUrl("https://sandbox-api.iyzipay.com");
        //https://sandbox-api.iyzipay.com
    }


    //form olusturma
    public function setForm(array $param)
    {
        $this->request = new \Iyzipay\Request\CreateCheckoutFormInitializeRequest();
        $this->request->setLocale(\Iyzipay\Model\Locale::TR);
        $this->request->setConversationId($param['ConversationId']);
        $this->request->setPrice($param['Price']);
        $this->request->setPaidPrice($param['PaidPrice']);
        $this->request->setCurrency(\Iyzipay\Model\Currency::TL);
        $this->request->setBasketId($param['BasketId']);
        $this->request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
        $this->request->setCallbackUrl("https://www.merchant.com/callback");
        $this->request->setEnabledInstallments(array(2, 3, 6, 9));
        return $this;
    }


    //Alici Bilgileri
    public function setBuyer(array $param)
    {
        $buyer = new \Iyzipay\Model\Buyer();
        $buyer->setId($param['Id']);
        $buyer->setName($param['Name']);
        $buyer->setSurname($param['Surname']);
        $buyer->setGsmNumber($param['GsmNumber']);
        $buyer->setEmail($param['Email']);
        $buyer->setIdentityNumber($param['IdentityNumber']);
        $buyer->setRegistrationAddress($param['RegistrationAddress']);
        $buyer->setIp($param['Ip']);
        $buyer->setCity($param['City']);
        $buyer->setCountry($param['Country']);
        $this->request->setBuyer($buyer);
        return $this;
    }


    // Kargo Alacak kisi bilgileri
    public function setShipping(array $param)
    {
        $shippingAddress = new \Iyzipay\Model\Address();
        $shippingAddress->setContactName($param['ContactName']);
        $shippingAddress->setCity($param['City']);
        $shippingAddress->setCountry($param['Country']);
        $shippingAddress->setAddress($param['Address']);
        $this->request->setShippingAddress($shippingAddress);
        return $this;
    }

    // Fatura bilgileri
    public function setBilling(array $param)
    {
        $billingAddress = new \Iyzipay\Model\Address();
        $billingAddress->setContactName($param['ContactName']);
        $billingAddress->setCity($param['City']);
        $billingAddress->setCountry($param['Country']);
        $billingAddress->setAddress($param['Address']);
        $this->request->setBillingAddress($billingAddress);
        return $this;
    }


    // Sepet Icindekiler
    public function setItems(array $items)
    {
        foreach ($items as $key => $value) {
            $basketItem = new \Iyzipay\Model\BasketItem();
            $basketItem->setId($items['Id']);
            $basketItem->setName($items['Name']);
            $basketItem->setCategory1($items['Category']);
            $basketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
            $basketItem->setPrice($items['Price']);
            array_push($this->basketItems, $basketItem);
        }
        $this->request->setBasketItems($this->basketItems);
        return $this;
    }

    public function payment()
    {
        return \Iyzipay\Model\CheckoutFormInitialize::create($this->request, $this->options);
    }

    //callBackResult
    public function callBackResult($token, $conversationId)
    {
        $request = new \Iyzipay\Request\RetrieveCheckoutFormRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId($conversationId);
        $request->setToken($token);
        $checkoutForm = \Iyzipay\Model\CheckoutForm::retrieve($request, $this->options);
        return $checkoutForm;
    }



}
