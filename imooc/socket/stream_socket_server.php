<?php
header('content-type:text/html;charset=utf-8');
$server = stream_socket_server('tcp://0.0.0.0:8000',$errno,$errstr) or die(
    'create server failed');
for ($i = 0; $i < 32; $i++) 
{
    if (pcntl_fork()==0)
    {
        while (true)
        {
            $conn = stream_socket_accept($server);
            
            if ($conn == false) 
            {
                continue;
            }
            fwrite($response, $string);
            fclose($conn);
        }    
        exit(0);
    }
}