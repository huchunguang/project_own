<?php
header('content-type:text/html;charset=utf-8');
$reactor = new Reactor();
$svr_sock = stream_socket_server('tcp://0.0.0.0:8000',$errorNo,$errorStr);
$reactor->add($svr_sock,EV_READ,function()use($svr_sock,$reactor){
    $cli_sock = stream_socket_accept($svr_sock);
    $reactor->add($cli_sock,EV_HEAD,function()use($cli_sock,$reactor){
        $request = fread($cli_sock, 8192);
        $reactor->add($cli_sock,EV_HEAD,function()use($cli_sock,$request,$cli_sock){
            fwrite($cli_sock, "hello world\n");
            $reactor->del($cli_sock);
            fclose($cli_sock);
        });
    });
});