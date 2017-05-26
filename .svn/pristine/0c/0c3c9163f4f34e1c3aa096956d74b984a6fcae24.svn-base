"use strict";
import axios from 'axios'

function toQueryString(obj) {
  return obj ? Object.keys(obj).sort().map(function (key) {
    let val = obj[key];

    if( val == null ) {
      val = ''
    }

    // console.log( 'val:', val )

    if (Array.isArray(val)) {
      return val.sort().map(function (val2) {
        return encodeURIComponent(key) + '=' + encodeURIComponent(val2);
      }).join('&');
    }
    return encodeURIComponent(key) + '=' + encodeURIComponent(val);
  }).join('&') : '';
}

function getData( { url, params={}, raw=false } ) {
  return _fetchData( { url, method:'get', data:{}, params, raw } )
}

function postData( { url, params={}, data={}, raw=false } ) {
  return _fetchData( { url, method:'post', params, data, raw } )
}

async function _fetchData( { url, method, params, data, raw=false } ) {
  let respObj, resp;
  try{
    respObj = await axios.request({
      url,
      method,
      params,
      data: method=='post' ? toQueryString(data) : null,
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
      },
    });
    resp = respObj.data;
    if( raw ) {
      return resp;
    }
  } catch(e) {
    console.log('ajax error', url, e);
    if( raw ) await Promise.reject(e);
    await Promise.reject({
      ecode: -1,
      emsg: '网络故障',
    });
  }

  if( resp.ecode == 0 ) {
    return resp.data;
  }else{
    await Promise.reject( resp );
  }
}

const webTools = {
  toQueryString,
  getData,
  postData,
};

export { webTools as default };
