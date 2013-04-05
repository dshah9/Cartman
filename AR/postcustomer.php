<?php

function postTo($url) {
                global $apiBaseURL;

                $fakeID = rand(100, 999);

                $params = array(
                                                                                //'ABN'                                                                 =>           '',
                                                                                //'ABNBranch'                                   =>           123,
                                                                                //'PriceLevelId'                 =>           '',
                                                                                'CreditLimit'                                        =>           '500.00',
                                                                                'OnHold'                                                               =>           'false',
                                                                                //'VolumeDiscount'                        =>           0,
                                                                                //'IncomeAccountId'                      =>           '4-1100',
                                                                                'UseCustomerTaxCode'                =>           'true',
                                                                                'Memo'                                                                =>           'This is a test insert',
                                                                                'SaleLayoutId'                    =>           3,
                                                                                //'HourlyBillingRate'        =>           0,
                                                                                'PrintedForm'                                    =>           'Pre-Printed Invoice',
                                                                                //'SaleComment'                                             =>           'SaleComment',
                                                                                //'ShippingMethod'                        =>           'Pigeon',
                                                                                'TaxIdNumber'                                  =>           rand(100000000, 999999999),
                                                                                //'TermsId'                                                         =>           '',
                                                                                //'SalesPersonId'                             =>           '',
                                                                                'TaxCodeId'                                                        =>           'GST',
                                                                                'FreightTaxCodeId'                          =>           'GST',
                                                                                'Addresses' => array(
                                                                                                array(
                                                                                                'Index' => 1,
                                                                                                'Street' => '123 Some Street',
                                                                                                'City' => 'Terrigal',
                                                                                                'State' => 'NSW',
                                                                                                'PostCode' => '2118',
                                                                                                'Country' => 'Australia',
                                                                                                'Phone1' => '02 4384 5623',
                                                                                                'Phone2' => '02 9524 4000',
                                                                                                'Phone3' => '',
                                                                                                'Fax' => '02 4384 5621',
                                                                                                'Email' => '',
                                                                                                'Website' => '',
                                                                                                'ContactName' => 'Keran',
                                                                                                'Salutation' => 'Mr.',
                                                                                                ),
                                                                                                array(
                                                                                                'Index' => 2,
                                                                                                'Street' => '456 Some Street',
                                                                                                'City' => 'Terrigal',
                                                                                                'State' => 'NSW',
                                                                                                'PostCode' => '2118',
                                                                                                'Country' => 'Australia',
                                                                                                'Phone1' => '02 4384 5623',
                                                                                                'Phone2' => '02 9524 4000',
                                                                                                'Phone3' => '',
                                                                                                'Fax' => '02 4384 5621',
                                                                                                'Email' => '',
                                                                                                'Website' => '',
                                                                                                'ContactName' => 'Dave',
                                                                                                'Salutation' => 'Mr.',
                                                                                                ),
                                                                                                ),
                                                                                'Id'                                                                          =>           'CUS'.$fakeID,  // MUST BE UNIQUE
                                                                                'CoLastName'                                    =>           'API Testing '.rand(1,15),
                                                                                'FirstName'                                         =>           'Chewy '.rand(1,15),
                                                                                'IsIndividual'                       =>           'True',
                                                                                'EnteredId'                                                          =>           'CUS'.$fakeID,
                                                                                'IsActive'                                              =>           'True',
                                                                                'Description'                                       =>           'This is us testing the POST crap to the API',
                                                                                'Tags'                                                     =>           'CAB',
                                                                                //'CustomLists'                                  =>           '',
                                                                                //'CustomFields'                               =>           '',
                                                                                //'CurrentBalance'                           =>           rand(100,500),
                                ); // end params array
                
                $params = http_build_query($params);

                
                //echo $url.$params;
    $session = curl_init($url); 

    // Tell curl to use HTTP POST
    curl_setopt ($session, CURLOPT_POST, true); 
    // Tell curl that this is the body of the POST
    curl_setopt ($session, CURLOPT_POSTFIELDS, $params); 
    // setup the authentication
    curl_setopt($session, CURLOPT_USERPWD, 'administrator' . ":");
    // Tell curl not to return headers, but do return the response
    curl_setopt($session, CURLOPT_HEADER, true); 
    curl_setopt($session, CURLOPT_RETURNTRANSFER, true);



    $response = curl_exec($session); 
                curl_close($session);
                echo $params;
                echo '<h1>Testing Customer '.$fakeID.'</h1>';
                echo('<pre>'.$response.'</pre>');
                return($response);
}

// testing POST to Localhost only
$test = postTo('http://localhost:8080/AccountRight/4c4af152-f9d3-41ae-a7df-f67d96242574/Customer/');
