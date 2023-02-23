import{u as v,o as i,g as d,d as o,f as y,h as l,l as h,b as t,v as m,t as n,y as p,F as b,x as _,n as k}from"./app.c4c2e632.js";const j={class:"modal fade",id:"jobInfoModal",tabindex:"-1","aria-labelledby":"jobInfoModal","aria-hidden":"true"},g={class:"modal-dialog"},M={class:"modal-content"},I=["onSubmit"],S=o("div",{class:"modal-header"},[o("h5",{class:"modal-title",id:"jobInfoModal"}," Update Job Information "),o("button",{type:"button",class:"btn-close","data-coreui-dismiss":"modal","aria-label":"Close"})],-1),U={class:"modal-body"},w={class:"row g-3"},x={class:"col-12"},V=o("label",{for:"trans_date",class:"form-label"}," Date ",-1),D={class:"col-12"},J=o("label",{for:"location",class:"form-label"}," Location ",-1),O=["value"],B={class:"col-12"},E=o("label",{for:"department",class:"form-label"},"Department",-1),F=["value"],N={class:"col-12"},C=o("label",{for:"position",class:"form-label"},"Job Title",-1),L=["value"],T={class:"modal-footer"},z=["disabled"],G={__name:"EmployeeJobInfoModal",props:{employee_id:Number,locations:Object,departments:Object,positions:Object,reportingto:Object},setup(c){const u=c,e=v({trans_date:dateNow,location:"",department:"",position:"",employee_id:u.employee_id}),f=()=>{e.post(route("employee.jobinfohistory.store"),{preserveScroll:!0,onSuccess:()=>{e.reset("trans_date","location","department","position"),$("#jobInfoModal").modal("hide")}})};return(q,a)=>(i(),d("div",j,[o("div",g,[o("div",M,[o("form",{onSubmit:y(f,["prevent"])},[S,o("div",U,[o("div",w,[o("div",x,[V,l(o("input",{type:"date",class:"form-control",id:"trans_date","onUpdate:modelValue":a[0]||(a[0]=s=>t(e).trans_date=s)},null,512),[[h,t(e).trans_date]]),l(o("div",{class:"invalid-feedback",style:{display:"block"}},n(t(e).errors.trans_date),513),[[m,t(e).errors.trans_date]])]),o("div",D,[J,l(o("select",{class:"form-select",id:"location","onUpdate:modelValue":a[1]||(a[1]=s=>t(e).location=s)},[(i(!0),d(b,null,_(c.locations,(s,r)=>(i(),d("option",{key:r,value:s.id},n(s.title),9,O))),128))],512),[[p,t(e).location]]),l(o("div",{class:"invalid-feedback",style:{display:"block"}},n(t(e).errors.location),513),[[m,t(e).errors.location]])]),o("div",B,[E,l(o("select",{class:"form-select",id:"department","onUpdate:modelValue":a[2]||(a[2]=s=>t(e).department=s)},[(i(!0),d(b,null,_(c.departments,(s,r)=>(i(),d("option",{key:r,value:s.id},n(s.title),9,F))),128))],512),[[p,t(e).department]]),l(o("div",{class:"invalid-feedback",style:{display:"block"}},n(t(e).errors.department),513),[[m,t(e).errors.department]])]),o("div",N,[C,l(o("select",{class:"form-select",id:"position","onUpdate:modelValue":a[3]||(a[3]=s=>t(e).position=s)},[(i(!0),d(b,null,_(c.positions,(s,r)=>(i(),d("option",{key:r,value:s.id},n(s.title),9,L))),128))],512),[[p,t(e).position]]),l(o("div",{class:"invalid-feedback",style:{display:"block"}},n(t(e).errors.position),513),[[m,t(e).errors.position]])])])]),o("div",T,[o("button",{type:"submit",class:k(["btn btn-sm btn-primary",{"opacity-25":t(e).processing}]),disabled:t(e).processing}," Update ",10,z)])],40,I)])])]))}};export{G as default};