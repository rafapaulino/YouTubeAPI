<?php

namespace YouTube;

class CountChannelSubscribers
{
	private $_apiKey;
	private $_channelId;
	private $_curl;
	private $_url;

	public function __construct( $key, $id )
	{
		$this->_apiKey = $key;
		$this->_channelId = $id;
		$this->_curl = curl_init(); 
		$this->_url = "https://www.googleapis.com/youtube/v3/channels?part=statistics&id=".$this->_channelId."&key=".$this->_apiKey;
	}

	public function __destruct()
	{
		curl_close($this->_curl);
	}

	public function getSubscriberCount()
	{
        curl_setopt($this->_curl, CURLOPT_URL, $this->getUrl()); 
        
        //return the transfer as a string 
        curl_setopt($this->_curl, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($this->_curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($this->_curl, CURLOPT_SSL_VERIFYHOST, 0);
        
        // $output contains the output string 
        $output = curl_exec($this->_curl); 

        // Decoding json response
		$response = json_decode($output, true);

		if ( count($response) > 0 ) {
			$result = $this->returnArrayResult($response);
		} else {
			$result = $this->returnArrayErrorResult($response);
		}

		return $result;
	}

	private function returnArrayErrorResult($result)
	{
		return array(
			'total' => 0,
			'result' => 'error',
			'response' => $result
		);
	}

	private function returnArrayResult($result)
	{
		return array(
			'total' => intval($result['items'][0]['statistics']['subscriberCount']),
			'result' => 'success',
			'response' => $result
		);
	}

    /**
     * @return mixed
     */
    public function getApiKey()
    {
        return $this->_apiKey;
    }

    /**
     * @return mixed
     */
    public function getChannelId()
    {
        return $this->_channelId;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->_url;
    }
}