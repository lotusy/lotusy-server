<?php
class GetWeiboUserInfoRequest extends RestRequest {

	private $accessToken = '';
	private $uid = '';

	public function GetWeiboUserInfoRequest($token, $uid) {
		$this->accessToken = $token;
		$this->uid = $uid;
	}

	protected function getUrl() {
		return 'https://api.weibo.com/2/users/show.json?uid='.$this->uid.'&access_token='.$this->accessToken;
	}

	protected function getMethod() {
		return 'GET';
	}

	protected function parseResponse($response) {
		$json = json_decode($response, TRUE);
		$rv = array();
		if (isset($json['error'])) {
			$rv['status'] = 'error';
			return $rv;
		} else {
			$rv['status'] = 'success';
			$rv['username'] = $response['name'];
			$rv['gender'] = $response['gender'];
			$rv['nickname'] = $response['screen_name'];
			$rv['profile_pic'] = $response['profile_image_url'];
		}

		return $rv;
	}
}
?>