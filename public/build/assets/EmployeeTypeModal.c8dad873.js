import{u,o as n,g as i,d as e,f as b,h as a,l as c,b as o,v as m,t as d,y as v,F as f,x as h,n as k}from"./app.c4c2e632.js";const M={class:"modal fade",id:"employeeTypeModal",tabindex:"-1","aria-labelledby":"employeeTypeModal","aria-hidden":"true"},S={class:"modal-dialog"},T={class:"modal-content"},g=["onSubmit"],x=e("div",{class:"modal-header"},[e("h5",{class:"modal-title",id:"employeeTypeModal"}," Update Employment Type "),e("button",{type:"button",class:"btn-close","data-coreui-dismiss":"modal","aria-label":"Close"})],-1),w={class:"modal-body"},E={class:"row g-3"},U={class:"col-12"},V=e("label",{for:"trans_date",class:"form-label"}," Date ",-1),B={class:"col-12"},C=e("label",{for:"employee_status",class:"form-label"},"Employee Status",-1),D=["value"],F={class:"col-12"},N=e("label",{for:"comment",class:"form-label"}," Comment ",-1),j={class:"modal-footer"},z=["disabled"],q={__name:"EmployeeTypeModal",props:{employee_id:Number,employment_types:Object},setup(r){const p=r,t=u({trans_date:dateNow,employment_type:"",comment:"",employee_id:p.employee_id}),y=()=>{t.post(route("employee.typehistory.store"),{preserveScroll:!0,onSuccess:()=>{t.reset("trans_date","employment_type","comment"),$("#employeeTypeModal").modal("hide")}})};return(L,l)=>(n(),i("div",M,[e("div",S,[e("div",T,[e("form",{onSubmit:b(y,["prevent"])},[x,e("div",w,[e("div",E,[e("div",U,[V,a(e("input",{type:"date",class:"form-control",id:"trans_date","onUpdate:modelValue":l[0]||(l[0]=s=>o(t).trans_date=s)},null,512),[[c,o(t).trans_date]]),a(e("div",{class:"invalid-feedback",style:{display:"block"}},d(o(t).errors.trans_date),513),[[m,o(t).errors.trans_date]])]),e("div",B,[C,a(e("select",{class:"form-select",id:"employee_status","onUpdate:modelValue":l[1]||(l[1]=s=>o(t).employment_type=s)},[(n(!0),i(f,null,h(r.employment_types,(s,_)=>(n(),i("option",{key:_,value:s.id},d(s.title),9,D))),128))],512),[[v,o(t).employment_type]]),a(e("div",{class:"invalid-feedback",style:{display:"block"}},d(o(t).errors.employment_type),513),[[m,o(t).errors.employment_type]])]),e("div",F,[N,a(e("input",{type:"text",class:"form-control",id:"comment","onUpdate:modelValue":l[2]||(l[2]=s=>o(t).comment=s)},null,512),[[c,o(t).comment]]),a(e("div",{class:"invalid-feedback",style:{display:"block"}},d(o(t).errors.comment),513),[[m,o(t).errors.comment]])])])]),e("div",j,[e("button",{type:"submit",class:k(["btn btn-sm btn-primary",{"opacity-25":o(t).processing}]),disabled:o(t).processing}," Update ",10,z)])],40,g)])])]))}};export{q as default};