const requette = async (url:string, object_body?:{method:string, headers:any, body:FormData}) => {
   //fetch a request and retur response as json object
   if(object_body){
     const response = await fetch(url, {
       method: object_body.method,
       headers: object_body.headers,
       body: object_body.body,
     })
     return response.json();
   }
   const response = await fetch(url);
   return response.json();
}
export default requette