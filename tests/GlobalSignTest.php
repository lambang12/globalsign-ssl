<?php

use PHPUnit\Framework\TestCase;
use Detain\MyAdminGlobalSign\GlobalSign;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2017-07-26 at 07:21:00.
 */
class GlobalSignTest extends TestCase {
	/**
	 * @var GlobalSign
	 */
	protected $object;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp() {
		if (file_exists(__DIR__.'/.env')) {
			$dotenv = new Dotenv\Dotenv(__DIR__);
			$dotenv->load();
		}
		$testing = FALSE;
		if ($testing == TRUE)
			$this->object = new GlobalSign(getenv('GLOBALSIGN_TEST_USERNAME'), getenv('GLOBALSIGN_TEST_PASSWORD'), TRUE);
		else
			$this->object = new GlobalSign(getenv('GLOBALSIGN_USERNAME'), getenv('GLOBALSIGN_PASSWORD'));

	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown() {
	}

	/**
	 * @covers GlobalSign::GetOrderByOrderID
	 * @todo   Implement testGetOrderByOrderID().
	 */
	public function testGetOrderByOrderID() {
		$this->markTestIncomplete('This test has not been implemented yet.');
		$response = $this->object->GetOrderByOrderID('CE201011028514');
		$this->assertArrayKeyExists('Response', $response);
		$this->ArrayKeyExists('QueryResponseHeader', $response['Response']);
		$this->ArrayKeyExists('SuccessCode', $response['Response']['QueryResponseHeader']);
		$this->assertEquals($response['Response']['QueryResponseHeader']['SuccessCode'], 0, 'Ensuring we got the proper SuccessCode (0)');
		$this->ArrayKeyExists('SearchOrderDetails', $response['Response']);
		$this->assertTrue(is_array($response['Response']['SearchOrderDetails']['SearchOrderDetail']));
		$this->assertArrayHasKey(0, $response['Response']['SearchOrderDetails']['SearchOrderDetail']);
		$this->ArrayKeyExists('OrderID', $response['Response']['SearchOrderDetails']['SearchOrderDetail'][0]);
		$this->ArrayKeyExists('OrderKind', $response['Response']['SearchOrderDetails']['SearchOrderDetail'][0]);
		$this->ArrayKeyExists('OrderStatus', $response['Response']['SearchOrderDetails']['SearchOrderDetail'][0]);
		$this->ArrayKeyExists('FQDN', $response['Response']['SearchOrderDetails']['SearchOrderDetail'][0]);
		$this->assertTrue(strpos($response['Response']['SearchOrderDetails']['SearchOrderDetail'][0]['FQDN'], 'interserver.net') !== FALSE);
	}

	/**
	 * @covers GlobalSign::GetOrderByDateRange
	 * @todo   Implement testGetOrderByDateRange().
	 */
	public function testGetOrderByDateRange() {
		$response = $this->object->GetOrderByDateRange('2017-11-24T00:00:01.000-05:00', '2017-11-24T23:23:59.000-05:00');
		$this->assertObjectHasAttribute('Response', $response, 'Ensuring Valid Respone Field "Response" Exists');
		$this->assertObjectHasAttribute('QueryResponseHeader', $response->Response, 'Ensuring Valid Respone Field "QueryResponseHeader" Exists');
		$this->assertObjectHasAttribute('SuccessCode', $response->Response->QueryResponseHeader, 'Ensuring Valid Respone Field "SuccessCode" Exists');
		//var_export($response);
		$this->assertEquals(0, $response->Response->QueryResponseHeader->SuccessCode, 'Ensuring we got the proper SuccessCode (0)');
		$this->assertObjectHasAttribute('OrderDetails', $response->Response, 'Ensuring Valid Respone Field "OrderDetails" Exists');
	}

	/**
	 * @covers GlobalSign::GetCertificateOrders
	 * @todo   Implement testGetCertificateOrders().
	 */
	public function testGetCertificateOrders() {
		$response = $this->object->GetCertificateOrders('2017-11-24T00:00:01.000-05:00', '2017-11-24T23:23:59.000-05:00');
		$this->assertObjectHasAttribute('Response', $response, 'Ensuring Valid Respone Field "Response" Exists');
		$this->assertObjectHasAttribute('QueryResponseHeader', $response->Response, 'Ensuring Valid Respone Field "QueryResponseHeader" Exists');
		$this->assertObjectHasAttribute('SuccessCode', $response->Response->QueryResponseHeader, 'Ensuring Valid Respone Field "SuccessCode" Exists');
		//var_export($response);
		$this->assertEquals(0, $response->Response->QueryResponseHeader->SuccessCode, 'Ensuring we got the proper SuccessCode (0)');
		$this->assertObjectHasAttribute('SearchOrderDetails', $response->Response, 'Ensuring Valid Respone Field "SearchOrderDetails" Exists');
		$response = $this->object->GetCertificateOrders('', '', 'interserver.net');
		$this->assertObjectHasAttribute('Response', $response, 'Ensuring Valid Respone Field "Response" Exists');
		$this->assertObjectHasAttribute('QueryResponseHeader', $response->Response, 'Ensuring Valid Respone Field "QueryResponseHeader" Exists');
		$this->assertObjectHasAttribute('SuccessCode', $response->Response->QueryResponseHeader, 'Ensuring Valid Respone Field "SuccessCode" Exists');
		$this->assertEquals($response->Response->QueryResponseHeader->SuccessCode, 0, 'Ensuring we got the proper SuccessCode (0)');
		$this->assertObjectHasAttribute('SearchOrderDetails', $response->Response, 'Ensuring Valid Respone Field "SearchOrderDetails" Exists');
		$this->assertTrue(is_array($response->Response->SearchOrderDetails->SearchOrderDetail));
		$this->assertArrayHasKey(0, $response->Response->SearchOrderDetails->SearchOrderDetail);
		$this->assertObjectHasAttribute('OrderID', $response->Response->SearchOrderDetails->SearchOrderDetail[0], 'Ensuring Valid Respone Field "OrderID" Exists');
		$this->assertObjectHasAttribute('OrderKind', $response->Response->SearchOrderDetails->SearchOrderDetail[0], 'Ensuring Valid Respone Field "OrderKind" Exists');
		$this->assertObjectHasAttribute('OrderStatus', $response->Response->SearchOrderDetails->SearchOrderDetail[0], 'Ensuring Valid Respone Field "OrderStatus" Exists');
		$this->assertObjectHasAttribute('FQDN', $response->Response->SearchOrderDetails->SearchOrderDetail[0], 'Ensuring Valid Respone Field "FQDN" Exists');
		$this->assertTrue(strpos($response->Response->SearchOrderDetails->SearchOrderDetail[0]->FQDN, 'interserver.net') !== FALSE);
		$response = $this->object->GetCertificateOrders('', '', '', '3');
		$this->assertObjectHasAttribute('Response', $response, 'Ensuring Valid Respone Field "Response" Exists');
		$this->assertObjectHasAttribute('QueryResponseHeader', $response->Response, 'Ensuring Valid Respone Field "QueryResponseHeader" Exists');
		$this->assertObjectHasAttribute('SuccessCode', $response->Response->QueryResponseHeader, 'Ensuring Valid Respone Field "SuccessCode" Exists');
		$this->assertEquals($response->Response->QueryResponseHeader->SuccessCode, 0, 'Ensuring we got the proper SuccessCode (0)');
		$this->assertObjectHasAttribute('SearchOrderDetails', $response->Response, 'Ensuring Valid Respone Field "SearchOrderDetails" Exists');
		$this->assertTrue(is_array($response->Response->SearchOrderDetails->SearchOrderDetail));
		$this->assertArrayHasKey(0, $response->Response->SearchOrderDetails->SearchOrderDetail);
		$this->assertObjectHasAttribute('OrderID', $response->Response->SearchOrderDetails->SearchOrderDetail[0], 'Ensuring Valid Respone Field "OrderID" Exists');
		$this->assertObjectHasAttribute('OrderKind', $response->Response->SearchOrderDetails->SearchOrderDetail[0], 'Ensuring Valid Respone Field "OrderKind" Exists');
		$this->assertObjectHasAttribute('OrderStatus', $response->Response->SearchOrderDetails->SearchOrderDetail[0], 'Ensuring Valid Respone Field "OrderStatus" Exists');
		$this->assertObjectHasAttribute('FQDN', $response->Response->SearchOrderDetails->SearchOrderDetail[0], 'Ensuring Valid Respone Field "FQDN" Exists');
		$this->assertTrue($response->Response->SearchOrderDetails->SearchOrderDetail[0]->OrderStatus == '3');
	}

	/**
	 * @covers GlobalSign::ValidateOrderParameters
	 * @todo   Implement testValidateOrderParameters().
	 */
	public function testValidateOrderParameters() {
		$fqdn = 'somerandomnewdomain.net';
		list($csr, $cert, $pke) = $this->make_csr($fqdn, 'my@interserver.net', 'Secaucus', 'NJ', 'US', 'none', 'Administration') ;
		$response = $this->object->ValidateOrderParameters('DV_SHA2', $fqdn, $csr, FALSE);
		$this->assertObjectHasAttribute('Response', $response, 'Ensuring Valid Respone Field "Response" Exists');
		$this->assertObjectHasAttribute('OrderResponseHeader', $response->Response, 'Ensuring Valid Respone Field "OrderResponseHeader" Exists');
		$this->assertObjectHasAttribute('SuccessCode', $response->Response->OrderResponseHeader, 'Ensuring Valid Respone Field "SuccessCode" Exists');
		$this->assertEquals($response->Response->OrderResponseHeader->SuccessCode, 0, 'Ensuring we got the proper SuccessCode (0)');
		$this->assertObjectHasAttribute('Price', $response->Response, 'Ensuring Valid Respone Field "Price" Exists');
		$this->assertObjectHasAttribute('ValidityPeriod', $response->Response, 'Ensuring Valid Respone Field "ValidityPeriod" Exists');
		$this->assertObjectHasAttribute('Months', $response->Response->ValidityPeriod, 'Ensuring Valid Respone Field "Months" Exists');
		$this->assertObjectHasAttribute('ParsedCSR', $response->Response, 'Ensuring Valid Respone Field "ParsedCSR" Exists');
		$this->assertObjectHasAttribute('DomainName', $response->Response->ParsedCSR, 'Ensuring Valid Respone Field "DomainName" Exists');
		$this->assertObjectHasAttribute('Email', $response->Response->ParsedCSR, 'Ensuring Valid Respone Field "Email" Exists');
		$this->assertObjectHasAttribute('IsValidDomainName', $response->Response->ParsedCSR, 'Ensuring Valid Respone Field "IsValidDomainName" Exists');
		unset($response);
		$response = $this->object->ValidateOrderParameters('DV_SHA2', $fqdn, 'invalid csr', FALSE);
		$this->assertObjectHasAttribute('Response', $response, 'Ensuring Valid Respone Field "Response" Exists');
		$this->assertObjectHasAttribute('OrderResponseHeader', $response->Response, 'Ensuring Valid Respone Field "OrderResponseHeader" Exists');
		$this->assertObjectHasAttribute('SuccessCode', $response->Response->OrderResponseHeader, 'Ensuring Valid Respone Field "SuccessCode" Exists');
		$this->assertEquals($response->Response->OrderResponseHeader->SuccessCode, -1, 'Invalid CSR Returns Error');
		$this->assertObjectHasAttribute('Errors', $response->Response->OrderResponseHeader, 'Ensuring Valid Respone Field "Errors" Exists');
		$this->assertObjectHasAttribute('Error', $response->Response->OrderResponseHeader->Errors, 'Ensuring Valid Respone Field "Error" Exists');
		$this->assertObjectHasAttribute('ErrorCode', $response->Response->OrderResponseHeader->Errors->Error, 'Ensuring Valid Respone Field "ErrorCode" Exists');
		$this->assertObjectHasAttribute('ErrorMessage', $response->Response->OrderResponseHeader->Errors->Error, 'Ensuring Valid Respone Field "ErrorMessage" Exists');
	}

	/**
	 * @covers GlobalSign::create_alphassl
	 * @todo   Implement testCreate_alphassl().
	 */
	public function testCreate_alphassl() {
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @covers GlobalSign::create_domainssl
	 * @todo   Implement testCreate_domainssl().
	 */
	public function testCreate_domainssl() {
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @covers GlobalSign::create_domainssl_autocsr
	 * @todo   Implement testCreate_domainssl_autocsr().
	 */
	public function testCreate_domainssl_autocsr() {
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @covers GlobalSign::create_organizationssl
	 * @todo   Implement testCreate_organizationssl().
	 */
	public function testCreate_organizationssl() {
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @covers GlobalSign::create_organizationssl_autocsr
	 * @todo   Implement testCreate_organizationssl_autocsr().
	 */
	public function testCreate_organizationssl_autocsr() {
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @covers GlobalSign::create_extendedssl
	 * @todo   Implement testCreate_extendedssl().
	 */
	public function testCreate_extendedssl() {
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @covers GlobalSign::DVOrder
	 * @todo   Implement testDVOrder().
	 */
	public function testDVOrder() {
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @covers GlobalSign::OVOrder
	 * @todo   Implement testOVOrder().
	 */
	public function testOVOrder() {
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @covers GlobalSign::OVOrderWithoutCSR
	 * @todo   Implement testOVOrderWithoutCSR().
	 */
	public function testOVOrderWithoutCSR() {
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @covers GlobalSign::EVOrder
	 * @todo   Implement testEVOrder().
	 */
	public function testEVOrder() {
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @covers GlobalSign::GetDVApproverList
	 * @todo   Implement testGetDVApproverList().
	 */
	public function testGetDVApproverList() {
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @covers GlobalSign::ResendEmail
	 * @todo   Implement testResendEmail().
	 */
	public function testResendEmail() {
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @covers GlobalSign::ChangeApproverEmail
	 * @todo   Implement testChangeApproverEmail().
	 */
	public function testChangeApproverEmail() {
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @covers GlobalSign::renewValidateOrderParameters
	 * @todo   Implement testRenewValidateOrderParameters().
	 */
	public function testRenewValidateOrderParameters() {
		$response = $this->object->renewValidateOrderParameters('DV_LOW_SHA2', 'synergypublishers.com', "", FALSE, 'CE20171125014256');
		$this->assertObjectHasAttribute('Response', $response, 'Ensuring Valid Respone Field "Response" Exists');
		$this->assertObjectHasAttribute('OrderResponseHeader', $response->Response, 'Ensuring Valid Respone Field "OrderResponseHeader" Exists');
		$this->assertObjectHasAttribute('SuccessCode', $response->Response->OrderResponseHeader, 'Ensuring Valid Respone Field "SuccessCode" Exists');
		$this->assertEquals($response->Response->OrderResponseHeader->SuccessCode, -1, 'Invalid CSR Returns Error');
		$this->assertObjectHasAttribute('Errors', $response->Response->OrderResponseHeader, 'Ensuring Valid Respone Field "Errors" Exists');
		$this->assertObjectHasAttribute('Error', $response->Response->OrderResponseHeader->Errors, 'Ensuring Valid Respone Field "Error" Exists');
		$this->assertObjectHasAttribute('ErrorCode', $response->Response->OrderResponseHeader->Errors->Error, 'Ensuring Valid Respone Field "ErrorCode" Exists');
		$this->assertObjectHasAttribute('ErrorMessage', $response->Response->OrderResponseHeader->Errors->Error, 'Ensuring Valid Respone Field "ErrorMessage" Exists');
	}

	/**
	 * @covers GlobalSign::renewAlphaDomain
	 * @todo   Implement testRenewAlphaDomain().
	 */
	public function testRenewAlphaDomain() {
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @covers GlobalSign::renewDVOrder
	 * @todo   Implement testRenewDVOrder().
	 */
	public function testRenewDVOrder() {
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @covers GlobalSign::renewOVOrder
	 * @todo   Implement testRenewOVOrder().
	 */
	public function testRenewOVOrder() {
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @covers GlobalSign::renewOrganizationSSL
	 * @todo   Implement testRenewOrganizationSSL().
	 */
	public function testRenewOrganizationSSL() {
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @covers GlobalSign::renewEVOrder
	 * @todo   Implement testRenewEVOrder().
	 */
	public function testRenewEVOrder() {
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @covers GlobalSign::renewExtendedSSL
	 * @todo   Implement testRenewExtendedSSL().
	 */
	public function testRenewExtendedSSL() {
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @covers GlobalSign::ReIssue
	 * @todo   Implement testReIssue().
	 */
	public function testReIssue() {
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @covers GlobalSign::DVOrderWithoutCSR
	 * @todo   Implement testDVOrderWithoutCSR().
	 */
	public function testDVOrderWithoutCSR() {
		$this->markTestIncomplete('This test has not been implemented yet.');
	}


	/**
	 * make_csr()
	 * @param string $fqdn
	 * @param string $email
	 * @param string $city
	 * @param string $state
	 * @param string $country
	 * @param string $company
	 * @param string $department
	 * @return array
	 */
	public function make_csr($fqdn, $email, $city, $state, $country, $company, $department) {
		$SSLcnf = [
			'config' => '/etc/pki/tls/openssl.cnf',
			//'config' => '/etc/ssl/openssl.cnf',
			//'config' => '/etc/tinyca/openssl.cnf',
			//'config' => '/etc/openvpn/easy-rsa/openssl.cnf',
			'encrypt_key' => true,
			'private_key_type' => OPENSSL_KEYTYPE_RSA,
			'digest_alg' => 'sha2',
			'x509_extensions' => 'v3_ca',
			'private_key_bits' => 2048
		];
		// $fqdn = domain name for normal certs, individuals full name for s/MIME certs
		$dn = [
			'countryName' => $country,
			'stateOrProvinceName' => $state,
			'localityName' => $city,
			'organizationName' => $company,
			'organizationalUnitName' => $department,
			'commonName' => $fqdn,
			'emailAddress' => $email
		];
		// Generate a new private (and public) key pair
		$privkey = openssl_pkey_new($SSLcnf);
		// Generate a certificate signing request
		$csr = openssl_csr_new($dn, $privkey, $SSLcnf);
		openssl_csr_export($csr, $csrout);
		// You will usually want to create a self-signed certificate at this point until your CA fulfills your request. This creates a self-signed cert that is valid for 365 days
		$sscert = openssl_csr_sign($csr, null, $privkey, 365);
		// Now you will want to preserve your private key, CSR and self-signed cert so that they can be installed into your web server, mail server or mail client (depending on the intended use of the certificate). This example shows how to get those things into variables, but you can also store them directly into files. Typically, you will send the CSR on to your CA who will then issue you with the "real" certificate.
		openssl_x509_export($sscert, $certout);
		openssl_pkey_export($privkey, $pkeout);
		// Show any errors that occurred here
		//while (($e = openssl_error_string()) !== false)
		//   echo $e . "\n";
		return [$csrout, $certout, $pkeout];
	}
}
