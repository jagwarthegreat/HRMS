import{u as m,o as d,g as l,d as o,f as u,h as i,x as p,b as t,F as f,s as b,v as y,t as r,n as h}from"./app.ad2c8530.js";const v={class:"modal fade",id:"addDocumentModal",tabindex:"-1","aria-labelledby":"addDocumentModal","aria-hidden":"true"},g={class:"modal-dialog"},D={class:"modal-content"},S=["onSubmit"],M=o("div",{class:"modal-header"},[o("h5",{class:"modal-title",id:"addDocumentModal"}," Upload Document "),o("button",{type:"button",class:"btn-close","data-coreui-dismiss":"modal","aria-label":"Close"})],-1),k={class:"modal-body"},F={class:"row g-3"},w={class:"col-12"},x=o("label",{for:"doc_category",class:"form-label"},"Category",-1),B=["value"],C={class:"col-12"},U=o("label",{for:"doc_file",class:"form-label"}," File ",-1),A={class:"modal-footer"},V=["disabled"],L={__name:"AddDocumentModal",props:{client_id:String,docTypes:Array},setup(c){const e=m({doc_category:"",doc_file:"",client_id:c.client_id}),n=()=>{e.post(route("client.docs.store"),{forceFormData:!0,preserveScroll:!0,onSuccess:()=>{e.reset(["doc_category","doc_file","client_id"]),$("#addDocumentModal").modal("hide")}})};return(E,a)=>(d(),l("div",v,[o("div",g,[o("div",D,[o("form",{onSubmit:u(n,["prevent"]),enctype:"multipart/form-data"},[M,o("div",k,[o("div",F,[o("div",w,[x,i(o("select",{class:"form-select",id:"doc_category","onUpdate:modelValue":a[0]||(a[0]=s=>t(e).doc_category=s)},[(d(!0),l(f,null,b(c.docTypes,(s,_)=>(d(),l("option",{key:_,value:s.id},r(s.title),9,B))),128))],512),[[p,t(e).doc_category]]),i(o("div",{class:"invalid-feedback",style:{display:"block"}},r(t(e).errors.doc_category),513),[[y,t(e).errors.doc_category]])]),o("div",C,[U,o("input",{type:"file",class:"form-control",id:"doc_file",name:"doc_file",onInput:a[1]||(a[1]=s=>t(e).doc_file=s.target.files[0])},null,32)])])]),o("div",A,[o("button",{type:"submit",class:h(["btn btn-sm btn-primary",{"opacity-25":t(e).processing}]),disabled:t(e).processing}," Upload ",10,V)])],40,S)])])]))}};export{L as default};
