# 封装axios-请求拦截器和响应拦截器
  封装axios的目的是设置请求拦截器和响应拦截器。请求拦截器的作用是在项目中准备发送请求时，可以在请求
拦截器中做一些事情。例如添加请求头。requests.interceptors.request.use((config) => {});。响应拦截器的作用是当服务器响应时，可以在响应拦截器中做一些事情。例如进度条的设置。

# 封装axios-请求数据函数。
  将axios请求封装成一个请求函数，函数的参数对象就是axios()的参数对象。axios({url:xx, method:xx, 
header:xx, data:xx})函数根据参数对象中的属性向发送请求。url是请求地址，method是请求方式，data是请求携带的数据，header是请求头。axios()返回的是promise对象，promise对象中的data属性的值就是请求的数据。
通过promise中的then()处理请求成功的结果，通过promise对象中的catch()处理请求失败的结果。

function axiosPost (options) {
  axios({
    url: options.url,
    method: 'post',
    header: {
      "Content-Type": "application/x-www-form-urlencoded"
    },
    data: qs.stringify({
      ...options.data,
    })
  })
  .then((res) => {
    options.success(res.data);
  })
  .catch((err) => {
    options.error(err);
  })
}