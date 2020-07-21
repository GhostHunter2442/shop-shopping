// import Axios from "axios";

class Errors{
    constructor(){
        this.errors = {};
    }
    has(field){
        return this.errors.hasOwnProperty(field);
    }
    any(){
        return Object.keys(this.errors).length > 0;
    }
    get(field){
        if(this.errors[field]){
            return this.errors[field][0];
        }
    }
    record(errors){
        this.errors = errors.errors;

    }
    clear(field){
        // if(field){
        //     return deletethis.errors[field][0];
        // }


            this.errors = {};

            // return;
           // return delete this.errors[field][0];
        // }

    }
    // reset(){
    //      for(let field in this.originalData){
    //          this[field]='';
    //      }
    //      this.errors.clear();
    // }
    // post(url){
    //     return this.submit('post',url);
    //  }
    // put(url){
    //     return this.submit('put',url);
    //  }
    //  patch(url){
    //     return this.submit('patch',url);
    //  }
    // delete(url){
    //      return this.submit('delete',url);
    // }
    // submit(requestType, url){
    //     return new Promise((resolve,reject)=>{
    //        axios[requestType](url,this.data()).then(
    //         response =>{
    //             this.onSuccess(response.data);
    //             resolve(response.data);
    //         })
    //         .catch(error =>{
    //             this.onFail(error.response.data);
    //             reject(error.response.data);
    //         });

    //     });
    // }

    // onSuccess(data){
    //     alert(data.message);
    //     this.reset();
    // }
    // onFail(errors){
    //       this.errors.record(errors);
    // }

}

export default Errors;
