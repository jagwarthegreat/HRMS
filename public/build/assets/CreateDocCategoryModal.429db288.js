import{u as d,o as c,g as r,d as t,f as n,h as a,l as m,b as e,v as _,t as b,n as u}from"./app.ad2c8530.js";const h={class:"modal fade",id:"createDocCatModal",tabindex:"-1","aria-labelledby":"createDocCatModal","aria-hidden":"true"},p={class:"modal-dialog"},v={class:"modal-content"},f=["onSubmit"],y=t("div",{class:"modal-header"},[t("h5",{class:"modal-title",id:"createDocCatModal"}," Add Document Category "),t("button",{type:"button",class:"btn-close","data-coreui-dismiss":"modal","aria-label":"Close"})],-1),g={class:"modal-body"},C={class:"row g-3"},D={class:"col-12"},M=t("label",{for:"title",class:"form-label"},"Title",-1),S={class:"modal-footer"},x=["disabled"],F={__name:"CreateDocCategoryModal",setup(k){const s=d({title:""}),l=()=>{s.post(route("settings.doc.category.store"),{onSuccess:()=>{s.reset("title"),$("#createDocCatModal").modal("hide")}})};return(w,o)=>(c(),r("div",h,[t("div",p,[t("div",v,[t("form",{onSubmit:n(l,["prevent"])},[y,t("div",g,[t("div",C,[t("div",D,[M,a(t("input",{type:"text",class:"form-control",id:"title","onUpdate:modelValue":o[0]||(o[0]=i=>e(s).title=i)},null,512),[[m,e(s).title]]),a(t("div",{class:"invalid-feedback",style:{display:"block"}},b(e(s).errors.title),513),[[_,e(s).errors.title]])])])]),t("div",S,[t("button",{type:"submit",class:u(["btn btn-sm btn-primary",{"opacity-25":e(s).processing}]),disabled:e(s).processing}," Save Changes ",10,x)])],40,f)])])]))}};export{F as default};
