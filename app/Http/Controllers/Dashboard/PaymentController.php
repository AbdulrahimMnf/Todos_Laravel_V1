<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Libraries\Iyzico;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $data = new Iyzico;
        $payment = $data
            ->setForm(
                [
                    'ConversationId' => '123456797',
                    'Price' => '1',
                    'PaidPrice' => '1.2',
                    'BasketId' => 'B67832'
                ]
            )
            ->setBuyer([
                'Id' => 'BY789',
                'Name' => 'aaaaaa',
                'Surname' => 'Test',
                'GsmNumber' => '+905350000000',
                'Email' => 'email@email.com',
                'IdentityNumber' => '74300864791',
                'RegistrationAddress' => 'Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1',
                'City' => 'Istanbul',
                'Ip' => '85.34.78.112',
                'Country' => 'Turkey'
            ])
            ->setShipping([
                'ContactName' => 'vvvvv Doe',
                'City' => 'Turkey',
                'Country' => 'Istanbul',
                'Address' => 'Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1'
            ])
            ->setBilling([
                'ContactName' => 'Jane Doe',
                'City' => 'Turkey',
                'Country' => 'Istanbul',
                'Address' => 'Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1'
            ])
            ->setItems([
                // this can take multi array
                'Id' => 'BI101',
                'Name' => 'Binocular',
                'Category' => 'Accessories',
                'Price' => '120'
            ])->payment();

        return view('index', [
            'paymentContent' => $payment,
            // 'paymentContent' => $payment->getCheckoutFormContent(),
            'status' => $payment->getStatus()
        ]);
    }


    public function callBack()
    {
        dd($_REQUEST);

        $token = $_REQUEST['token'];
        $conversationId = '123456789';
        $iyzico =  new Iyzico;
        $response = $iyzico->callBackResult($token, $conversationId);
        return view('callback', [
            'patmentStatus' => $response->getPaymentStatus(),
        ]);
    }

    public function test()
    {

        $options = new \Iyzipay\Options();
        $options->setApiKey("sandbox-1xftuqE96bBYPLQjKS864fxV8ePNpfM1");
        $options->setSecretKey("sandbox-q1s0fII2pKXMaQ3mm0xSq7zz9Dj0wPG8");
        $options->setBaseUrl("https://sandbox-api.iyzipay.com");

        # create request class
        $request = new \Iyzipay\Request\CreateCheckoutFormInitializeRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("1234567890");
        $request->setPrice("1");
        $request->setPaidPrice("1.2");
        $request->setCurrency(\Iyzipay\Model\Currency::TL);
        $request->setBasketId("B67832");
        $request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
        $request->setCallbackUrl(url('dashboard'));//need post method * error verecek
        $request->setEnabledInstallments(array(2, 3, 6, 9));

        $buyer = new \Iyzipay\Model\Buyer();
        $buyer->setId("BY789");
        $buyer->setName("John");
        $buyer->setSurname("Doe");
        $buyer->setGsmNumber("+905350000000");
        $buyer->setEmail("email@email.com");
        $buyer->setIdentityNumber("74300864791");
        $buyer->setLastLoginDate("2015-10-05 12:43:35");
        $buyer->setRegistrationDate("2013-04-21 15:12:09");
        $buyer->setRegistrationAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $buyer->setIp("85.34.78.112");
        $buyer->setCity("Istanbul");
        $buyer->setCountry("Turkey");
        $buyer->setZipCode("34732");
        $request->setBuyer($buyer);

        $shippingAddress = new \Iyzipay\Model\Address();
        $shippingAddress->setContactName("Jane Doe");
        $shippingAddress->setCity("Istanbul");
        $shippingAddress->setCountry("Turkey");
        $shippingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $shippingAddress->setZipCode("34742");
        $request->setShippingAddress($shippingAddress);

        $billingAddress = new \Iyzipay\Model\Address();
        $billingAddress->setContactName("Jane Doe");
        $billingAddress->setCity("Istanbul");
        $billingAddress->setCountry("Turkey");
        $billingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $billingAddress->setZipCode("34742");
        $request->setBillingAddress($billingAddress);

        $basketItems = array();
        $firstBasketItem = new \Iyzipay\Model\BasketItem();
        $firstBasketItem->setId("BI101");
        $firstBasketItem->setName("Binocular");
        $firstBasketItem->setCategory1("Collectibles");
        $firstBasketItem->setCategory2("Accessories");
        $firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
        $firstBasketItem->setPrice("0.3");
        $basketItems[0] = $firstBasketItem;

        $secondBasketItem = new \Iyzipay\Model\BasketItem();
        $secondBasketItem->setId("BI102");
        $secondBasketItem->setName("Game code");
        $secondBasketItem->setCategory1("Game");
        $secondBasketItem->setCategory2("Online Game Items");
        $secondBasketItem->setItemType(\Iyzipay\Model\BasketItemType::VIRTUAL);
        $secondBasketItem->setPrice("0.5");
        $basketItems[1] = $secondBasketItem;

        $thirdBasketItem = new \Iyzipay\Model\BasketItem();
        $thirdBasketItem->setId("BI103");
        $thirdBasketItem->setName("Usb");
        $thirdBasketItem->setCategory1("Electronics");
        $thirdBasketItem->setCategory2("Usb / Cable");
        $thirdBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
        $thirdBasketItem->setPrice("0.2");
        $basketItems[2] = $thirdBasketItem;
        $request->setBasketItems($basketItems);

        # make request
        $checkoutFormInitialize = \Iyzipay\Model\CheckoutFormInitialize::create($request, $options);
        $a  = $checkoutFormInitialize->getCheckoutFormContent();

        return view('dashboard.izyco.index', compact('a'));
        // return view('index', compact('checkoutFormInitialize'));
    }
}
