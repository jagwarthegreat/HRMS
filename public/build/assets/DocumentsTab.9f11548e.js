import{o as l,g as d,d as e,e as _,F as i,x as p,a as m,t as o,p as h,q as b}from"./app.c4c2e632.js";import f from"./AddDocumentModal.7d082f7a.js";import{_ as y}from"./_plugin-vue_export-helper.cdc0426e.js";const n=t=>(h("data-v-9d971dae"),t=t(),b(),t),v={class:"col-m-12 mb-3"},g=n(()=>e("svg",{class:"icon"},[e("use",{"xlink:href":"/theme/vendors/@coreui/icons/svg/free.svg#cil-cloud-upload"})],-1)),x={class:"col-12"},k={class:"table table-hover",style:{border:"1px solid #ddd"}},T=n(()=>e("thead",null,[e("tr",null,[e("th"),e("th",null,"Filename"),e("th",null,"Modified"),e("th",null,"Created by"),e("th",null,"File size")])],-1)),D={key:0},B=n(()=>e("td",{colspan:"5"},"No documents found.",-1)),C=[B],F={__name:"DocumentsTab",props:{props:Object},setup(t){function r(a){$("#"+a).modal("show")}return(a,c)=>(l(),d(i,null,[e("div",v,[e("button",{class:"btn btn-sm btn-primary ms-auto me-1 text-light",onClick:c[0]||(c[0]=s=>r("addDocumentModal"))},[g,_(" Upload ")])]),e("div",x,[e("table",k,[T,e("tbody",null,[t.props.client.documents.length<1?(l(),d("tr",D,C)):(l(!0),d(i,{key:1},p(t.props.client.documents,(s,u)=>(l(),d("tr",{key:u},[e("td",null,o(s.document_category.title),1),e("td",null,o(s.filename),1),e("td",null,o(s.created_at),1),e("td",null,o(s.created_by.firstname+" "+s.created_by.lastname),1),e("td",null,o(s.filesize+"KB"),1)]))),128))])])]),m(f,{client_id:t.props.client.id,docTypes:t.props.docCategories},null,8,["client_id","docTypes"])],64))}},M=y(F,[["__scopeId","data-v-9d971dae"]]);export{M as default};