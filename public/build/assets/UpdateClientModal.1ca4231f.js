import{u as r,o as _,g as m,d as s,f as p,h as l,v as d,b as t,t as i,n as b,p as u,q as h,e as c}from"./app.17ce0bb9.js";import{_ as v}from"./_plugin-vue_export-helper.cdc0426e.js";const a=o=>(u("data-v-67f2b5f9"),o=o(),h(),o),f={class:"modal fade",id:"updateClientModal",tabindex:"-1","aria-labelledby":"updateClientModal","aria-hidden":"true"},y={class:"modal-dialog modal-lg"},C={class:"modal-content"},g=["onSubmit"],k=a(()=>s("div",{class:"modal-header"},[s("h5",{class:"modal-title",id:"updateClientModal"}," Update Client Detail "),s("button",{type:"button",class:"btn-close","data-coreui-dismiss":"modal","aria-label":"Close"})],-1)),x={class:"modal-body"},S={class:"row"},M=a(()=>s("input",{type:"hidden",id:"clientid"},null,-1)),w={class:"col-12"},U={class:"row g-3"},I={class:"col-md-8"},B=a(()=>s("label",{for:"name",class:"form-label"},[c(" Name"),s("span",{class:"text-danger"},"*")],-1)),D=a(()=>s("input",{type:"text",class:"form-control",id:"name"},null,-1)),N={class:"col-md-4"},A=a(()=>s("label",{for:"contact",class:"form-label"},[c(" Contact"),s("span",{class:"text-danger"},"*")],-1)),E=a(()=>s("input",{type:"text",class:"form-control",id:"contact"},null,-1)),V={class:"col-md-4"},q=a(()=>s("label",{for:"email",class:"form-label"},"E-mail Address",-1)),z=a(()=>s("input",{type:"email",class:"form-control",id:"email"},null,-1)),F={class:"col-md-8"},T=a(()=>s("label",{for:"address",class:"form-label"},"Address",-1)),j=a(()=>s("input",{type:"address",class:"form-control",id:"address"},null,-1)),G={class:"modal-footer"},H=["disabled"],J={__name:"UpdateClientModal",setup(o){const e=r({client_id:"",name:"",address:"",contact:"",email:""}),n=()=>{e.client_id=$("#clientid").val(),e.name=$("#name").val(),e.contact=$("#contact").val(),e.email=$("#email").val(),e.address=$("#address").val(),e.post(route("client.update"),{preserveScroll:!0,onSuccess:()=>{$("#updateClientModal").modal("hide")}})};return(K,L)=>(_(),m("div",f,[s("div",y,[s("div",C,[s("form",{onSubmit:p(n,["prevent"])},[k,s("div",x,[s("div",S,[M,s("div",w,[s("div",U,[s("div",I,[B,D,l(s("div",{class:"invalid-feedback",style:{display:"block"}},i(t(e).errors.name),513),[[d,t(e).errors.name]])]),s("div",N,[A,E,l(s("div",{class:"invalid-feedback",style:{display:"block"}},i(t(e).errors.contact),513),[[d,t(e).errors.contact]])]),s("div",V,[q,z,l(s("div",{class:"invalid-feedback",style:{display:"block"}},i(t(e).errors.email),513),[[d,t(e).errors.email]])]),s("div",F,[T,j,l(s("div",{class:"invalid-feedback",style:{display:"block"}},i(t(e).errors.address),513),[[d,t(e).errors.address]])])])])])]),s("div",G,[s("button",{type:"submit",class:b(["btn btn-sm btn-primary",{"opacity-25":t(e).processing}]),disabled:t(e).processing}," Update client ",10,H)])],40,g)])])]))}},Q=v(J,[["__scopeId","data-v-67f2b5f9"]]);export{Q as default};