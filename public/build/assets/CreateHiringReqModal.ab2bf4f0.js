import{u as d,o as r,g as n,d as e,f as c,h as i,l as m,b as s,v as _,t as b,n as u}from"./app.c4c2e632.js";const h={class:"modal fade",id:"createHiringReqModal",tabindex:"-1","aria-labelledby":"createHiringReqModal","aria-hidden":"true"},p={class:"modal-dialog"},v={class:"modal-content"},f=["onSubmit"],g=e("div",{class:"modal-header"},[e("h5",{class:"modal-title",id:"createHiringReqModal"}," Add Requirement "),e("button",{type:"button",class:"btn-close","data-coreui-dismiss":"modal","aria-label":"Close"})],-1),y={class:"modal-body"},q={class:"row g-3"},M={class:"col-12"},R=e("label",{for:"title",class:"form-label"},"Title",-1),S={class:"modal-footer"},x=["disabled"],C={__name:"CreateHiringReqModal",setup(H){const t=d({title:""}),a=()=>{t.post(route("settings.requirement.store"),{onSuccess:()=>{t.reset("title"),$("#createHiringReqModal").modal("hide")}})};return(k,o)=>(r(),n("div",h,[e("div",p,[e("div",v,[e("form",{onSubmit:c(a,["prevent"])},[g,e("div",y,[e("div",q,[e("div",M,[R,i(e("input",{type:"text",class:"form-control",id:"title","onUpdate:modelValue":o[0]||(o[0]=l=>s(t).title=l)},null,512),[[m,s(t).title]]),i(e("div",{class:"invalid-feedback",style:{display:"block"}},b(s(t).errors.title),513),[[_,s(t).errors.title]])])])]),e("div",S,[e("button",{type:"submit",class:u(["btn btn-sm btn-primary",{"opacity-25":s(t).processing}]),disabled:s(t).processing}," Save Changes ",10,x)])],40,f)])])]))}};export{C as default};