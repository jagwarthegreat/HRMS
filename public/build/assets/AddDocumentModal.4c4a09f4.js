import{u as _,o as d,g as l,d as o,f as u,h as i,y as p,b as s,F as f,x as y,v as b,t as r,n as h}from"./app.c4c2e632.js";const v={class:"modal fade",id:"addDocumentModal",tabindex:"-1","aria-labelledby":"addDocumentModal","aria-hidden":"true"},g={class:"modal-dialog"},D={class:"modal-content"},M=["onSubmit"],S=o("div",{class:"modal-header"},[o("h5",{class:"modal-title",id:"addDocumentModal"}," Upload Document "),o("button",{type:"button",class:"btn-close","data-coreui-dismiss":"modal","aria-label":"Close"})],-1),k={class:"modal-body"},F={class:"row g-3"},w={class:"col-12"},x=o("label",{for:"employee_status",class:"form-label"},"Category",-1),B=["value"],C={class:"col-12"},U=o("label",{for:"doc_file",class:"form-label"}," File ",-1),N={class:"modal-footer"},V=["disabled"],E={__name:"AddDocumentModal",props:{employee_id:Number,docTypes:Object},setup(c){const e=_({doc_category:"",doc_file:"",employee_id:c.employee_id}),n=()=>{e.post(route("docs.store"),{forceFormData:!0,preserveScroll:!0,onSuccess:()=>{e.reset("doc_category","doc_file","employee_id"),$("#addDocumentModal").modal("hide")}})};return(z,a)=>(d(),l("div",v,[o("div",g,[o("div",D,[o("form",{onSubmit:u(n,["prevent"]),enctype:"multipart/form-data"},[S,o("div",k,[o("div",F,[o("div",w,[x,i(o("select",{class:"form-select",id:"doc_category","onUpdate:modelValue":a[0]||(a[0]=t=>s(e).doc_category=t)},[(d(!0),l(f,null,y(c.docTypes,(t,m)=>(d(),l("option",{key:m,value:t.id},r(t.title),9,B))),128))],512),[[p,s(e).doc_category]]),i(o("div",{class:"invalid-feedback",style:{display:"block"}},r(s(e).errors.doc_category),513),[[b,s(e).errors.doc_category]])]),o("div",C,[U,o("input",{type:"file",class:"form-control",id:"doc_file",name:"doc_file",onInput:a[1]||(a[1]=t=>s(e).doc_file=t.target.files[0])},null,32)])])]),o("div",N,[o("button",{type:"submit",class:h(["btn btn-sm btn-primary",{"opacity-25":s(e).processing}]),disabled:s(e).processing}," Upload ",10,V)])],40,M)])])]))}};export{E as default};