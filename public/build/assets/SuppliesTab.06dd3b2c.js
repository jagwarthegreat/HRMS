import{o as l,g as a,d as e,e as u,F as c,x as m,a as _,t as o,p as h,q as b}from"./app.c4c2e632.js";import f from"./AddDocumentModal.7d082f7a.js";/* empty css                                                                    */import{_ as y}from"./_plugin-vue_export-helper.cdc0426e.js";const d=t=>(h("data-v-4a6d8b3a"),t=t(),b(),t),g={class:"col-m-12 mb-3"},v=d(()=>e("svg",{class:"icon"},[e("use",{"xlink:href":"/theme/vendors/@coreui/icons/svg/free.svg#cil-cloud-upload"})],-1)),k={class:"col-12"},x={class:"table table-hover",style:{border:"1px solid #ddd"}},S=d(()=>e("thead",null,[e("tr",null,[e("th"),e("th",null,"Filename"),e("th",null,"Modified"),e("th",null,"Created by"),e("th",null,"File size")])],-1)),T={key:0},B=d(()=>e("td",{colspan:"5"},"No supply found.",-1)),C=[B],F={__name:"SuppliesTab",props:{props:Object},setup(t){function r(n){$("#"+n).modal("show")}return(n,i)=>(l(),a(c,null,[e("div",g,[e("button",{class:"btn btn-sm btn-primary ms-auto me-1 text-light",onClick:i[0]||(i[0]=s=>r("addDocumentModal"))},[v,u(" Add Supply ")])]),e("div",k,[e("table",x,[S,e("tbody",null,[t.props.client.documents.length<1?(l(),a("tr",T,C)):(l(!0),a(c,{key:1},m(t.props.client.documents,(s,p)=>(l(),a("tr",{key:p},[e("td",null,o(s.document_category.title),1),e("td",null,o(s.filename),1),e("td",null,o(s.created_at),1),e("td",null,o(s.created_by.firstname+" "+s.created_by.lastname),1),e("td",null,o(s.filesize+"KB"),1)]))),128))])])]),_(f,{client_id:t.props.client.id,docTypes:t.props.docCategories},null,8,["client_id","docTypes"])],64))}},w=y(F,[["__scopeId","data-v-4a6d8b3a"]]);export{w as default};
