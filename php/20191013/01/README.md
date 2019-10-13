#### 使用php搭建一个web服务器，实现nginx功能
> stream_socket_server()
>
stream_socket_server ( string $local_socket [, int &$errno [, string &$errstr [, int $flags = STREAM_SERVER_BIND | STREAM_SERVER_LISTEN [, resource $context ]]]] ) : resource

资源stream_socket_server（字符串local_socket [摘要和错误号[，串errstr [摘要标志[，资源环境]]]]）
创建指定流或数据报套接字 local_socket。：该类型创建由运输决定的插座的使用标准URL格式指定 运输：//目标。对于Internet域套接字（AF_INET），如TCP和UDP，该目标的一部分remote_socket参数应该由一个主机名或IP地址，后跟一个冒号和一个端口号。对于Unix域套接字，该目标部分应指向文件系统上的套接字文件。 标志是可被设置为套接字创建标记的任何组合的位掩码字段。标志的默认值为 STREAM_SERVER_BIND | STREAM_SERVER_LISTEN。
> stream_socket_accept()

stream_socket_accept ( resource $server_socket [, float $timeout = ini_get("default_socket_timeout") [, string &$peername ]] ) : resource

接受由 stream_socket_server() 创建的套接字连接。

> fread()

fread(file,length)

fread() 从文件指针 file 读取最多 length 个字节。该函数在读取完最多 length 个字节数，或到达 EOF 的时候，或（对于网络流）当一个包可用时，或（在打开用户空间流之后）已读取了 8192 个字节时就会停止读取文件，视乎先碰到哪种情况。
返回所读取的字符串，如果出错返回 false。

> fwrite()

fwrite(file,string,length)

fwrite() 把 string 的内容写入文件指针 file 处。 如果指定了 length，当写入了 length 个字节或者写完了 string 以后，写入就会停止，视乎先碰到哪种情况。
fwrite() 返回写入的字符数，出现错误时则返回 false。

> fclose()

fclose(file)

file 参数是一个文件指针。fclose() 函数关闭该指针指向的文件。
如果成功则返回 true，否则返回 false。
文件指针必须有效，并且是通过 fopen() 或 fsockopen() 成功打开的。

> 使用php实现单进程阻塞的网络服务，如果想实现更加复杂的功能，
> 比如多进程非租塞等可以参考workerman实现
