### AJAX介绍
AJAX：Asynchronous JavaScript And XML 异步的JavaScript和XML
 1、浏览器与服务器之间的通信基础是HTTP协议。协议规定了彼此请求和响应的格式。

 2、浏览器通过网页地址URL或表单向服务器提交请求。请求的资源包括页面、图片和视频等等。服务器向浏览器返回相应的响应，例如JSON数据。

 3、请求的两种方式：(1)、通过URL链接获取资源。Html中标签link中的ref下载CSS，标签script中的src下载JavaScript，标签image中的src下载图片，标签video中的src下载的视频。这些获取资源的方式都是由浏览器发起的HTTP请求。(2)、通过JavaScript写出来的程序单独向服务器发起HTTP请求，这就是异步请求。
 
 4、同步请求和异步请求：(1)、同步请求：浏览器（HTML页面）向服务器发送请求，服务器完成原HTML页面和数据的构建，然后再将构建好的PHP页面返回给浏览器渲染。由此可见，同步请求会重新渲染一遍原HTML页面。
 (2)AJAX异步请求：浏览器通过JavaScript脚本向服务器发起HTTP请求，服务器返回的是JSON数据或XML文档，而非PHP页面。如果是XML文档，JavaScript脚本通过获取DOM节点的方式获取XML文档中的节点内的数据，然后JavaScript脚本将这些数据整理成HTML页面字符串，然后交给HTML页面的某个节点内，最终实现对HTML页面的局部更新内容。如果是JSON数据，JavaScript脚本将这些数据整理成HTML页面字符串，然后交给HTML页面的某个节点内，最终实现对HTML页面的局部更新内容。
 4.1、简而言之，AJAX异步请求 请求服务器返回JSON数据/XML文档，浏览器从JSON/XML文档中提取数据，然后再在不刷新整个网页的基础上，将整理成HTML页面字符串的数据渲染到网页相应的位置。 服务器数据库中的数据可以通过相关转换器转换成XML数据格式/JSON数据格式。JSON数据和XML文档其实差不多，只是XML文档多了一步取节点数据的过程。 
 #请求的流程：服务器配置好数据库的接口，浏览器的页面通过AJAX根据服务器的URL地址请求数据库接口指定的数据。
 
 5、XMLHttpRequest对象是发起AJAX请求最根部的对象。对象的作用是：(1)、JS脚本发起HTTP请求必须通过XMLHttpRequest对象。(2)、XMLHttpRequest对象也是通过AJAX进行浏览器与服务器通信的接口。(3)、XMLHttpRequest对象不局限于XML，它可以发送任何格式的数据。   
 5.1、XMLHttpRequest本身是一个js引擎内置的构造函数，每次需要创建HTTP请求的时候，都需要实例化XMLHttpRequest构造函数。即let xhr = new XMLHttpRequest()。然后通过实例对象来完成发送HTTP请求
 5.2、XMLHttpRequest()的实例对象具有一些方法：(1)、xml.open(method, url, async)：发送前的设置。method是发送的请求方式，url是请求发送的地址，async是设置同步还是异步（true为异步、false为同步）。
 (2)、xml.send()：发送请求。发送GET请求不填写参数，发送POST请求体数据才用参数。
 
 6、AJAX发送请求是的响应任务。
 6.1、onreadystatechange事件：挂载到XMLHttpRequest对象上的事件。onreadystatechange事件的作用是监控readyState状态。也就是说，只要readyState状态一旦变化，onreadystatechange事件就会触发，onreadystatechange事件所绑定的事件处理函数就会被执行。
 6.2、readyState状态：通过XMLHttpRequest对象发送HTTP请求的各阶段状态码（0-4）。(0): 请求未初始化，即还没有建立请求。(1)：服务器连接已建立，即TCP连接已经建立。(2)、请求已接收，即服务端已经接收到浏览器的请求。(3)、请求处理中，即服务端正在处理请求。(4)、请求已完成，且响应已就绪，即请求处理完成并且返回数据。
 6.3、status状态：服务器响应的状态码（200 OK，404 未找到页面）
 当readyState变化时，将触发onreadystatechange事件执行其回调函数。
 注意：readyState仅仅是针对请求的状态码，获取资源是否成功取决于status状态。
 
 7、AJAX-服务器响应
 responseText：获取字符串数据。一般需要JSON.parse(xhr.responseText)来将字符串转化为JSON对象。
 responseXML：获取XML数据。
 
 8、AJAX-POST请求方式的注意事项
 POST请求方式下，send方法参数中的格式： a=1&b=2&c=3
 xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");POST请求方式必须设置在这个请求头信息，目的是将请求体中的数据转换为键值对，这样后端接受到a=1&b=2&c=3这样的数据才知道是这样一个POST方式传来的数据。即将a=1&b=2&c=3转化成{a:1, b:2, c:3}。因为HTTP协议都是二机制的，传输{}类型的数据消耗很大，所以浏览器基本都是传字符串类型的数据。x-www-form-urlencoded编码告诉服务器，a=1&b=2&c=3其实是键值对的形式，你将它转换为键值对再解析。
