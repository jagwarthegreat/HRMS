import{u as y,j as S,o as a,g as c,a as i,b as o,w as n,F as u,H as g,d as e,L as m,e as h,f as w,h as C,l as D,x as v,t as k,p as F,q as I}from"./app.17ce0bb9.js";import{_ as V}from"./AuthenticatedLayout.fb5b4752.js";import{_ as B}from"./_plugin-vue_export-helper.cdc0426e.js";const d=r=>(F("data-v-8fb33404"),r=r(),I(),r),L={class:"breadcrumb-item"},M={class:"breadcrumb-item"},N=d(()=>e("li",{class:"breadcrumb-item active","aria-current":"page"},"Create",-1)),T={class:"col-md-12 text-start mb-2"},A={class:"col-6"},H={class:"card mb-4"},R=d(()=>e("div",{class:"card-header"},"Role Detail",-1)),j={class:"card-body"},q=["onSubmit"],E={class:"row"},G={class:"col-md-12"},P={class:"mb-3"},U=d(()=>e("label",{for:"roletitle",class:"form-label"},"Title",-1)),z={class:"mb-3"},J=d(()=>e("label",{for:"rolepermission",class:"form-label"},"Permissions",-1)),K={class:"form-check"},O=["value","id"],Q=["for"],W={class:"form-check"},X=["value","id"],Y=["for"],Z=d(()=>e("div",{class:"col-12 text-base"},[e("button",{class:"btn btn-dark px-4",type:"submit"},"Save")],-1)),ee={__name:"Create",props:{permissions:Array,rolesChecks:Array},setup(r){const s=y({roletitle:"",rolepermission:[]}),x=()=>{var l=$('input[name="role[]"]:checked');l.each(function(){s.rolepermission.push($(this).val())}),console.log(s.rolepermission),s.post(route("role.store"),{onFinish:()=>{s.reset("roletitle"),s.reset("rolepermission")}})};return S(()=>{}),(l,p)=>(a(),c(u,null,[i(o(g),{title:"Create Role"}),i(V,null,{breadcrumbs:n(()=>[e("li",L,[i(o(m),{href:l.route("dashboard")},{default:n(()=>[h("Dashboard")]),_:1},8,["href"])]),e("li",M,[i(o(m),{href:l.route("role")},{default:n(()=>[h("Role")]),_:1},8,["href"])]),N]),default:n(()=>[e("div",T,[i(o(m),{class:"btn btn-dark btn-sm",href:l.route("role")},{default:n(()=>[h(" Go back ")]),_:1},8,["href"])]),e("div",A,[e("div",H,[R,e("div",j,[e("form",{onSubmit:w(x,["prevent"])},[e("div",E,[e("div",G,[e("div",P,[U,C(e("input",{type:"text",class:"form-control",id:"roletitle","onUpdate:modelValue":p[0]||(p[0]=t=>o(s).roletitle=t),autocomplete:"off"},null,512),[[D,o(s).roletitle]])]),e("div",z,[J,e("ul",null,[(a(!0),c(u,null,v(r.rolesChecks,(t,f)=>(a(),c("li",{class:"mt-3",key:f},[e("div",K,[e("input",{class:"form-check-input",type:"checkbox",name:"role[]",value:t.parent,id:"role"+t.parent},null,8,O),e("label",{class:"form-check-label",for:"role"+t.parent},k(f),9,Q)]),(a(!0),c(u,null,v(t.child,(_,b)=>(a(),c("ul",{key:b},[e("li",null,[e("div",W,[e("input",{class:"form-check-input",type:"checkbox",name:"role[]",value:_,id:"role"+_},null,8,X),e("label",{class:"form-check-label",for:"role"+_},k(b),9,Y)])])]))),128))]))),128))])])]),Z])],40,q)])])])]),_:1})],64))}},re=B(ee,[["__scopeId","data-v-8fb33404"]]);export{re as default};