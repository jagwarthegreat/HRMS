import{u as d,o as n,g as c,d as t,f as r,h as e,l as _,b as s,v as m,t as p,n as b}from"./app.17ce0bb9.js";const u={class:"modal fade",id:"createPositionModal",tabindex:"-1","aria-labelledby":"createPositionModal","aria-hidden":"true"},h={class:"modal-dialog"},v={class:"modal-content"},f=["onSubmit"],y=t("input",{type:"hidden",id:"position_id"},null,-1),g=t("div",{class:"modal-header"},[t("h5",{class:"modal-title",id:"createPositionModalTitle"}," Add Position "),t("button",{type:"button",class:"btn-close","data-coreui-dismiss":"modal","aria-label":"Close"})],-1),M={class:"modal-body"},P={class:"row g-3"},S={class:"col-12"},x=t("label",{for:"title",class:"form-label"},"Title",-1),k={class:"modal-footer"},w=["disabled"],D={__name:"CreatePositionModal",setup(C){const o=d({title:"",position_id:""}),a=()=>{o.title=$("#title").val(),o.position_id=$("#position_id").val(),o.post(route("position.store"),{onSuccess:()=>{o.reset("title"),$("#createPositionModal").modal("hide")}})};return(B,i)=>(n(),c("div",u,[t("div",h,[t("div",v,[t("form",{onSubmit:r(a,["prevent"])},[y,g,t("div",M,[t("div",P,[t("div",S,[x,e(t("input",{type:"text",class:"form-control",id:"title","onUpdate:modelValue":i[0]||(i[0]=l=>s(o).title=l)},null,512),[[_,s(o).title]]),e(t("div",{class:"invalid-feedback",style:{display:"block"}},p(s(o).errors.title),513),[[m,s(o).errors.title]])])])]),t("div",k,[t("button",{type:"submit",class:b(["btn btn-sm btn-primary",{"opacity-25":s(o).processing}]),disabled:s(o).processing}," Save Changes ",10,w)])],40,f)])])]))}};export{D as default};