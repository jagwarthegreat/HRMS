import{u as a,o as d,g as c,d as o,f as i,h as l,v as r,b as e,t as n,n as _}from"./app.17ce0bb9.js";const m={class:"modal fade",id:"createStockCategoryModal",tabindex:"-1","aria-labelledby":"createStockCategoryModal","aria-hidden":"true"},h={class:"modal-dialog"},b={class:"modal-content"},y=["onSubmit"],p=o("input",{type:"hidden",id:"category_id"},null,-1),u=o("div",{class:"modal-header"},[o("h5",{class:"modal-title",id:"createStockCategoryModalTitle"},"Add Stock Category"),o("button",{type:"button",class:"btn-close","data-coreui-dismiss":"modal","aria-label":"Close"})],-1),g={class:"modal-body"},v={class:"row g-3"},f={class:"col-12"},k=o("label",{for:"name",class:"form-label"},"Stock Name",-1),S=o("input",{type:"text",class:"form-control",id:"name"},null,-1),C={class:"modal-footer"},M=["disabled"],D={__name:"CreateStockCategoryModal",props:{},setup(w){const t=a({name:"",category_id:""}),s=()=>{t.name=$("#name").val(),t.category_id=$("#category_id").val(),t.post(route("stock.category.store"),{onSuccess:()=>{t.reset("name"),$("#createStockCategoryModal").modal("hide")}})};return(x,B)=>(d(),c("div",m,[o("div",h,[o("div",b,[o("form",{onSubmit:i(s,["prevent"])},[p,u,o("div",g,[o("div",v,[o("div",f,[k,S,l(o("div",{class:"invalid-feedback",style:{display:"block"}},n(e(t).errors.name),513),[[r,e(t).errors.name]])])])]),o("div",C,[o("button",{type:"submit",class:_(["btn btn-sm btn-primary",{"opacity-25":e(t).processing}]),disabled:e(t).processing}," Save Changes ",10,M)])],40,y)])])]))}};export{D as default};
