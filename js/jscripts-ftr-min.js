function wpss_get_ck(e){var t=document.cookie.split(";");for(var s in t)if(-1!=t[s].indexOf(e+"="))return decodeURIComponent(t[s].split("=")[1]);return""}function wpss_set_ck(e,t,s,n,i,_){var c=new Date;c.setTime(c.getTime()),s&&(s=1e3*s*60*60*24);var r=new Date(c.getTime()+s);document.cookie=e+"="+escape(t)+(s?";expires="+r.toGMTString():"")+(n?";path="+n:"")+(i?";domain="+i:"")+(_?";secure":"")}function wpss_ini_ck(){var e=wpss_get_ck("JCS_INENREF"),t=wpss_get_ck("JCS_INENTIM"),s=new Date,n=s.getTime(),i=document.referrer;e||wpss_set_ck("JCS_INENREF",i,1/24,"/"),t||wpss_set_ck("JCS_INENTIM",n,1/24,"/")}wpss_ini_ck();