<?php

use PHPUnit\Framework\TestCase;
use Detain\MyAdminGlobalSign\GlobalSign;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2017-07-26 at 07:21:00.
 */
class GlobalSignTest extends TestCase
{
	/**
	 * @var GlobalSign
	 */
	protected $object;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp()
	{
		if (file_exists(__DIR__.'/.env')) {
			$dotenv = new Dotenv\Dotenv(__DIR__);
			$dotenv->load();
		}
		$testing = false;
		if ($testing == true) {
			$this->object = new GlobalSign(getenv('GLOBALSIGN_TEST_USERNAME'), getenv('GLOBALSIGN_TEST_PASSWORD'), true);
		} else {
			$this->object = new GlobalSign(getenv('GLOBALSIGN_USERNAME'), getenv('GLOBALSIGN_PASSWORD'));
		}
	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown()
	{
	}

	/**
	 * @covers Detain\MyAdminGlobalSign\GlobalSign::GetOrderByOrderID
	 */
	public function testGetOrderByOrderID()
	{
		$response = $this->object->GetOrderByOrderID('CE201011028514');
		$this->assertArrayHasKey('Response', $response, 'Ensuring Valid Respone Field "Response" Exists');
		$this->assertArrayHasKey('OrderResponseHeader', $response['Response'], 'Ensuring Valid Respone Field "OrderResponseHeader" Exists');
		$this->assertArrayHasKey('SuccessCode', $response['Response']['OrderResponseHeader'], 'Ensuring Valid Respone Field "SuccessCode" Exists');
		$this->assertEquals($response['Response']['OrderResponseHeader']['SuccessCode'], 0, 'Ensuring we got the proper SuccessCode (0)');
		$this->assertArrayHasKey('OrderDetail', $response['Response'], 'Ensuring Valid Respone Field "OrderDetail" Exists');
		$this->assertArrayHasKey('OrderId', $response['Response']['OrderDetail']['OrderInfo'], 'Ensuring Valid Respone Field "OrderID" Exists');
		$this->assertArrayHasKey('ProductCode', $response['Response']['OrderDetail']['OrderInfo'], 'Ensuring Valid Respone Field "OrderKind" Exists');
		$this->assertArrayHasKey('OrderStatus', $response['Response']['OrderDetail']['OrderInfo'], 'Ensuring Valid Respone Field "OrderStatus" Exists');
		$this->assertArrayHasKey('DomainName', $response['Response']['OrderDetail']['OrderInfo'], 'Ensuring Valid Respone Field "FQDN" Exists');
		$this->assertEquals($response['Response']['OrderDetail']['OrderInfo']['DomainName'], 'inssl.net', 'Ensuring Valid Respone Field "DomainName" has expected inssl.net value');
	}

	/**
	 * @covers Detain\MyAdminGlobalSign\GlobalSign::GetOrderByDateRange
	 */
	public function testGetOrderByDateRange()
	{
		$response = $this->object->GetOrderByDateRange('2017-11-24T00:00:01.000-05:00', '2017-11-24T23:23:59.000-05:00');
		$this->assertObjectHasAttribute('Response', $response, 'Ensuring Valid Respone Field "Response" Exists');
		$this->assertObjectHasAttribute('QueryResponseHeader', $response->Response, 'Ensuring Valid Respone Field "QueryResponseHeader" Exists');
		$this->assertObjectHasAttribute('SuccessCode', $response->Response->QueryResponseHeader, 'Ensuring Valid Respone Field "SuccessCode" Exists');
		//var_export($response);
		$this->assertEquals(0, $response->Response->QueryResponseHeader->SuccessCode, 'Ensuring we got the proper SuccessCode (0)');
		$this->assertObjectHasAttribute('OrderDetails', $response->Response, 'Ensuring Valid Respone Field "OrderDetails" Exists');
	}

	/**
	 * @covers Detain\MyAdminGlobalSign\GlobalSign::GetCertificateOrders
	 */
	public function testGetCertificateOrders()
	{
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
		$this->assertArrayHasKey(0, $response->Response->SearchOrderDetails->SearchOrderDetail, 'Ensuring Response Field is an Array with at least 1 item');
		$this->assertObjectHasAttribute('OrderID', $response->Response->SearchOrderDetails->SearchOrderDetail[0], 'Ensuring Valid Respone Field "OrderID" Exists');
		$this->assertObjectHasAttribute('OrderKind', $response->Response->SearchOrderDetails->SearchOrderDetail[0], 'Ensuring Valid Respone Field "OrderKind" Exists');
		$this->assertObjectHasAttribute('OrderStatus', $response->Response->SearchOrderDetails->SearchOrderDetail[0], 'Ensuring Valid Respone Field "OrderStatus" Exists');
		$this->assertObjectHasAttribute('FQDN', $response->Response->SearchOrderDetails->SearchOrderDetail[0], 'Ensuring Valid Respone Field "FQDN" Exists');
		$this->assertTrue(strpos($response->Response->SearchOrderDetails->SearchOrderDetail[0]->FQDN, 'interserver.net') !== false);
		$response = $this->object->GetCertificateOrders('', '', '', '3');
		$this->assertObjectHasAttribute('Response', $response, 'Ensuring Valid Respone Field "Response" Exists');
		$this->assertObjectHasAttribute('QueryResponseHeader', $response->Response, 'Ensuring Valid Respone Field "QueryResponseHeader" Exists');
		$this->assertObjectHasAttribute('SuccessCode', $response->Response->QueryResponseHeader, 'Ensuring Valid Respone Field "SuccessCode" Exists');
		$this->assertEquals($response->Response->QueryResponseHeader->SuccessCode, 0, 'Ensuring we got the proper SuccessCode (0)');
		$this->assertObjectHasAttribute('SearchOrderDetails', $response->Response, 'Ensuring Valid Respone Field "SearchOrderDetails" Exists');
		$this->assertTrue(is_array($response->Response->SearchOrderDetails->SearchOrderDetail));
		$this->assertArrayHasKey(0, $response->Response->SearchOrderDetails->SearchOrderDetail, 'Ensuring Response Field is an Array with at least 1 item');
		$this->assertObjectHasAttribute('OrderID', $response->Response->SearchOrderDetails->SearchOrderDetail[0], 'Ensuring Valid Respone Field "OrderID" Exists');
		$this->assertObjectHasAttribute('OrderKind', $response->Response->SearchOrderDetails->SearchOrderDetail[0], 'Ensuring Valid Respone Field "OrderKind" Exists');
		$this->assertObjectHasAttribute('OrderStatus', $response->Response->SearchOrderDetails->SearchOrderDetail[0], 'Ensuring Valid Respone Field "OrderStatus" Exists');
		$this->assertObjectHasAttribute('FQDN', $response->Response->SearchOrderDetails->SearchOrderDetail[0], 'Ensuring Valid Respone Field "FQDN" Exists');
		$this->assertTrue($response->Response->SearchOrderDetails->SearchOrderDetail[0]->OrderStatus == '3');
	}

	/**
	 * @covers Detain\MyAdminGlobalSign\GlobalSign::ValidateOrderParameters
	 */
	public function testValidateOrderParameters()
	{
		$fqdn = 'somerandomnewdomain.net';
		list($csr, $cert, $pke) = make_csr($fqdn, 'my@interserver.net', 'Secaucus', 'NJ', 'US', 'none', 'Administration') ;
		$response = $this->object->ValidateOrderParameters('DV_SHA2', $fqdn, $csr, false);
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
		$response = $this->object->ValidateOrderParameters('DV_SHA2', $fqdn, 'invalid csr', false);
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
	 * @covers Detain\MyAdminGlobalSign\GlobalSign::GetDVApproverList
	 */
	public function testGetDVApproverList()
	{
		$response = $this->object->GetDVApproverList('interserver.net');
		$this->assertObjectHasAttribute('Response', $response, 'Ensuring Valid Respone Field "Response" Exists');
		$this->assertObjectHasAttribute('QueryResponseHeader', $response->Response, 'Ensuring Valid Respone Field "QueryResponseHeader" Exists');
		$this->assertObjectHasAttribute('SuccessCode', $response->Response->QueryResponseHeader, 'Ensuring Valid Respone Field "SuccessCode" Exists');
		$this->assertEquals($response->Response->QueryResponseHeader->SuccessCode, 0, 'Ensuring we got the proper SuccessCode (0)');
		$this->assertObjectHasAttribute('Approvers', $response->Response, 'Ensuring Valid Respone Field "Approvers" Exists');
		$this->assertObjectHasAttribute('OrderID', $response->Response, 'Ensuring Valid Respone Field "OrderID" Exists');
		$this->assertTrue(is_array($response->Response->Approvers->SearchOrderDetail));
		$this->assertArrayHasKey(0, $response->Response->Approvers->SearchOrderDetail, 'Ensuring Response Field is an Array with at least 1 item');
		$this->assertObjectHasAttribute('ApproverType', $response->Response->Approvers->SearchOrderDetail[0], 'Ensuring Valid Respone Field "ApproverType" Exists');
		$this->assertObjectHasAttribute('ApproverEmail', $response->Response->Approvers->SearchOrderDetail[0], 'Ensuring Valid Respone Field "ApproverEmail" Exists');
	}

	/**
	 * @covers Detain\MyAdminGlobalSign\GlobalSign::renewValidateOrderParameters
	 */
	public function testRenewValidateOrderParameters()
	{
		$response = $this->object->renewValidateOrderParameters('DV_LOW_SHA2', 'synergypublishers.com', "", false, 'CE20171125014256');
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
	 * @covers Detain\MyAdminGlobalSign\GlobalSign::ResendEmail
	 */
	public function testResendEmail()
	{
		$response = $this->object->ResendEmail('CE198105220000');
		$this->assertObjectHasAttribute('Response', $response, 'Ensuring Valid Respone Field "Response" Exists');
		$this->assertObjectHasAttribute('OrderResponseHeader', $response->Response, 'Ensuring Valid Respone Field "OrderResponseHeader" Exists');
		$this->assertObjectHasAttribute('SuccessCode', $response->Response->OrderResponseHeader, 'Ensuring Valid Respone Field "SuccessCode" Exists');
		$this->assertEquals($response->Response->OrderResponseHeader->SuccessCode, -1, 'Invalid Order ID Returns Error');
		$this->assertObjectHasAttribute('Errors', $response->Response->OrderResponseHeader, 'Ensuring Valid Respone Field "Errors" Exists');
		$this->assertObjectHasAttribute('Error', $response->Response->OrderResponseHeader->Errors, 'Ensuring Valid Respone Field "Error" Exists');
		$this->assertObjectHasAttribute('ErrorCode', $response->Response->OrderResponseHeader->Errors->Error, 'Ensuring Valid Respone Field "ErrorCode" Exists');
		$this->assertObjectHasAttribute('ErrorMessage', $response->Response->OrderResponseHeader->Errors->Error, 'Ensuring Valid Respone Field "ErrorMessage" Exists');
		$response = $this->object->ResendEmail('CE201011028514');
		$this->assertObjectHasAttribute('Response', $response, 'Ensuring Valid Respone Field "Response" Exists');
		$this->assertObjectHasAttribute('OrderResponseHeader', $response->Response, 'Ensuring Valid Respone Field "OrderResponseHeader" Exists');
		$this->assertObjectHasAttribute('SuccessCode', $response->Response->OrderResponseHeader, 'Ensuring Valid Respone Field "SuccessCode" Exists');
		$this->assertEquals($response->Response->OrderResponseHeader->SuccessCode, -1, 'Ensuring we got the proper SuccessCode (0)');
	}

	/**
	 * @covers Detain\MyAdminGlobalSign\GlobalSign::ChangeApproverEmail
	 * @todo   Implement testChangeApproverEmail().
	 */
	public function testChangeApproverEmail()
	{
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @covers Detain\MyAdminGlobalSign\GlobalSign::ReIssue
	 * @todo   Implement testReIssue().
	 */
	public function testReIssue()
	{
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @covers Detain\MyAdminGlobalSign\GlobalSign::DVOrder
	 * @todo   Implement testDVOrder().
	 */
	public function testDVOrder()
	{
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @covers Detain\MyAdminGlobalSign\GlobalSign::DVOrderWithoutCSR
	 * @todo   Implement testDVOrderWithoutCSR().
	 */
	public function testDVOrderWithoutCSR()
	{
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @covers Detain\MyAdminGlobalSign\GlobalSign::OVOrder
	 * @todo   Implement testOVOrder().
	 */
	public function testOVOrder()
	{
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @covers Detain\MyAdminGlobalSign\GlobalSign::OVOrderWithoutCSR
	 * @todo   Implement testOVOrderWithoutCSR().
	 */
	public function testOVOrderWithoutCSR()
	{
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @covers Detain\MyAdminGlobalSign\GlobalSign::EVOrder
	 * @todo   Implement testEVOrder().
	 */
	public function testEVOrder()
	{
		$this->markTestIncomplete('This test has not been implemented yet.');
	}


	/**
	 * @covers Detain\MyAdminGlobalSign\GlobalSign::create_alphassl
	 * @todo   Implement testCreate_alphassl().
	 */
	public function testCreate_alphassl()
	{
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @covers Detain\MyAdminGlobalSign\GlobalSign::create_domainssl
	 * @todo   Implement testCreate_domainssl().
	 */
	public function testCreate_domainssl()
	{
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @covers Detain\MyAdminGlobalSign\GlobalSign::create_domainssl_autocsr
	 * @todo   Implement testCreate_domainssl_autocsr().
	 */
	public function testCreate_domainssl_autocsr()
	{
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @covers Detain\MyAdminGlobalSign\GlobalSign::create_organizationssl
	 * @todo   Implement testCreate_organizationssl().
	 */
	public function testCreate_organizationssl()
	{
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @covers Detain\MyAdminGlobalSign\GlobalSign::create_organizationssl_autocsr
	 * @todo   Implement testCreate_organizationssl_autocsr().
	 */
	public function testCreate_organizationssl_autocsr()
	{
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @covers Detain\MyAdminGlobalSign\GlobalSign::create_extendedssl
	 * @todo   Implement testCreate_extendedssl().
	 */
	public function testCreate_extendedssl()
	{
		$this->markTestIncomplete('This test has not been implemented yet.');
	}
	/**
	 * @covers Detain\MyAdminGlobalSign\GlobalSign::renewAlphaDomain
	 * @todo   Implement testRenewAlphaDomain().
	 */
	public function testRenewAlphaDomain()
	{
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @covers Detain\MyAdminGlobalSign\GlobalSign::renewDVOrder
	 * @todo   Implement testRenewDVOrder().
	 */
	public function testRenewDVOrder()
	{
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @covers Detain\MyAdminGlobalSign\GlobalSign::renewOVOrder
	 * @todo   Implement testRenewOVOrder().
	 */
	public function testRenewOVOrder()
	{
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @covers Detain\MyAdminGlobalSign\GlobalSign::renewOrganizationSSL
	 * @todo   Implement testRenewOrganizationSSL().
	 */
	public function testRenewOrganizationSSL()
	{
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @covers Detain\MyAdminGlobalSign\GlobalSign::renewEVOrder
	 * @todo   Implement testRenewEVOrder().
	 */
	public function testRenewEVOrder()
	{
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @covers Detain\MyAdminGlobalSign\GlobalSign::renewExtendedSSL
	 * @todo   Implement testRenewExtendedSSL().
	 */
	public function testRenewExtendedSSL()
	{
		$this->markTestIncomplete('This test has not been implemented yet.');
	}
}
