<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Bar {

  class BarCoreClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
      parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \Bar\AddPostReq $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function AddPost(\Bar\AddPostReq $argument,
      $metadata = [], $options = []) {
      return $this->_simpleRequest('/bar.BarCore/AddPost',
      $argument,
      ['\Bar\AddPostRsp', 'decode'],
      $metadata, $options);
    }

  }

}
