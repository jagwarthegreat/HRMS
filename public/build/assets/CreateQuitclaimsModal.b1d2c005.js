import{u as b,j as y,o as n,g as r,d as e,f as v,F as f,s as h,h as l,v as d,b as t,t as i,l as c,n as g}from"./app.ad2c8530.js";const k={class:"modal fade",id:"createQuitClaimsModal",tabindex:"-1","aria-labelledby":"createQuitClaimsModal","aria-hidden":"true"},C={class:"modal-dialog modal-lg"},M={class:"modal-content"},S=["onSubmit"],Q=e("div",{class:"modal-header"},[e("h5",{class:"modal-title",id:"createQuitClaimsModal"}," Add Quit Claims "),e("button",{type:"button",class:"btn-close","data-coreui-dismiss":"modal","aria-label":"Close"})],-1),w={class:"modal-body"},x={class:"row g-3"},B={class:"col-md-12"},D=e("label",{for:"employee",class:"form-label"},"Employee",-1),E={class:"form-multi-select","data-coreui-search":"true","data-coreui-multiple":"false",id:"employee"},F=["value"],V={class:"col-md-4"},A=e("label",{for:"amount",class:"form-label"},"Amount",-1),U={class:"col-md-4"},q=e("label",{for:"resignation_date",class:"form-label"},"Resignation Date",-1),L={class:"col-4"},j=e("label",{for:"claims_date",class:"form-label"},"Claims Date",-1),z={class:"modal-footer"},I=["disabled"],R={__name:"CreateQuitclaimsModal",props:{props:Array},setup(m){const s=b({employee:"",amount:"",resignation_date:"",claims_date:""}),u=()=>{s.post(route("quitclaims.store"),{onSuccess:()=>{s.reset("employee","amount","resignation_date","claims_date"),$("#createQuitClaimsModal").modal("hide")}})};return y(()=>{document.getElementById("employee").addEventListener("changed.coreui.multi-select",o=>{const a=o.value;s.employee=a})}),(_,o)=>(n(),r("div",k,[e("div",C,[e("div",M,[e("form",{onSubmit:v(u,["prevent"])},[Q,e("div",w,[e("div",x,[e("div",B,[D,e("select",E,[(n(!0),r(f,null,h(m.props.employees,(a,p)=>(n(),r("option",{key:p,value:a.id},i(a.firstname+" "+a.lastname),9,F))),128))]),l(e("div",{class:"invalid-feedback",style:{display:"block"}},i(t(s).errors.employee),513),[[d,t(s).errors.employee]])]),e("div",V,[A,l(e("input",{type:"number",class:"form-control",id:"amount","onUpdate:modelValue":o[0]||(o[0]=a=>t(s).amount=a)},null,512),[[c,t(s).amount]]),l(e("div",{class:"invalid-feedback",style:{display:"block"}},i(t(s).errors.amount),513),[[d,t(s).errors.amount]])]),e("div",U,[q,l(e("input",{type:"date",class:"form-control",id:"resignation_date","onUpdate:modelValue":o[1]||(o[1]=a=>t(s).resignation_date=a)},null,512),[[c,t(s).resignation_date]]),l(e("div",{class:"invalid-feedback",style:{display:"block"}},i(t(s).errors.resignation_date),513),[[d,t(s).errors.resignation_date]])]),e("div",L,[j,l(e("input",{type:"date",class:"form-control",id:"claims_date","onUpdate:modelValue":o[2]||(o[2]=a=>t(s).claims_date=a)},null,512),[[c,t(s).claims_date]]),l(e("div",{class:"invalid-feedback",style:{display:"block"}},i(t(s).errors.claims_date),513),[[d,t(s).errors.claims_date]])])])]),e("div",z,[e("button",{type:"submit",class:g(["btn btn-sm btn-primary",{"opacity-25":t(s).processing}]),disabled:t(s).processing}," Save Changes ",10,I)])],40,S)])])]))}};export{R as default};
