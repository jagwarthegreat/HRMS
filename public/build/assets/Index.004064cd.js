import{u as g,o as y,g as w,a as c,b as a,w as p,F as x,H as S,d as s,L as U,e as _,f as I,h as i,l as u,v as m,t as v,n as k,p as C,q as E}from"./app.ad2c8530.js";import{_ as D}from"./AuthenticatedLayout.b6b5c74d.js";import{_ as O}from"./_plugin-vue_export-helper.cdc0426e.js";const r=l=>(C("data-v-a1d6fd8b"),l=l(),E(),l),V={class:"breadcrumb-item"},A=r(()=>s("li",{class:"breadcrumb-item active","aria-current":"page"},"User",-1)),B=r(()=>s("li",{class:"breadcrumb-item active","aria-current":"page"},"Profile",-1)),F={class:"col-12"},L={class:"card mb-4"},M=r(()=>s("div",{class:"card-header"},"My Profile",-1)),N={class:"card-body"},P=["onSubmit"],R={class:"row"},j={class:"col-3 text-center d-flex flex-column"},H={class:"avatar"},T=["src"],q=r(()=>s("label",{class:"btn btn-sm btn-dark mt-2",for:"user_avatar"}," Change Avatar ",-1)),z={class:"col-9"},G={class:"accordion mb-3",id:"updateEmployeeDetailAccordion"},J={class:"accordion-item mb-3"},K=r(()=>s("h2",{class:"accordion-header",id:"panelsStayOpen-headingUpdateEmp"},[s("button",{class:"accordion-button p-2",type:"button","data-coreui-toggle":"collapse","data-coreui-target":"#panelsStayOpen-collapseUpdateEmp","aria-expanded":"true","aria-controls":"panelsStayOpen-collapseUpdateEmp"}," Security ")],-1)),Q={id:"panelsStayOpen-collapseUpdateEmp",class:"accordion-collapse collapse show","aria-labelledby":"panelsStayOpen-headingUpdateEmp"},W={class:"accordion-body"},X={class:"row g-3"},Y={class:"col-md-4"},Z=r(()=>s("label",{for:"password",class:"form-label"},[_(" Password"),s("span",{class:"text-danger"},"*")],-1)),ss={class:"col-md-4"},as=r(()=>s("label",{for:"username",class:"form-label"},[_("Username"),s("span",{class:"text-danger"},"*")],-1)),es={clas:"col-12"},ts=["disabled"],os={__name:"Index",props:{user:Array,canCreate:Boolean},setup(l){const d=l,e=g({username:d.user.username,password:d.user.password,user_avatar:""}),b=()=>{e.post(route("user.profile.update",d.user.id),{preserveScroll:!0,onSuccess:()=>{alert("Changes saved.")}})};function f(n){if(n.files&&n.files[0]){var t=new FileReader;t.onload=function(o){$("#user_avatar_img").attr("src",o.target.result)},t.readAsDataURL(n.files[0])}}const h=d.user.avatar_slug===null||d.user.avatar_slug===""?"/theme/assets/img/avatars/default_avatar.jpeg":"/storage/"+d.user.avatar_slug;return(n,t)=>(y(),w(x,null,[c(a(S),{title:"User"}),c(D,null,{breadcrumbs:p(()=>[s("li",V,[c(a(U),{href:n.route("dashboard")},{default:p(()=>[_("Dashboard")]),_:1},8,["href"])]),A,B]),default:p(()=>[s("div",F,[s("div",L,[M,s("div",N,[s("form",{onSubmit:I(b,["prevent"])},[s("div",R,[s("div",j,[s("div",H,[s("img",{class:"avatar-img",id:"user_avatar_img",src:a(h),style:{"object-fit":"cover"}},null,8,T)]),s("input",{type:"file",id:"user_avatar",onInput:t[0]||(t[0]=o=>a(e).user_avatar=o.target.files[0]),style:{display:"none"},accept:"image/*",onChange:t[1]||(t[1]=o=>f(o.target))},null,32),q]),s("div",z,[s("div",G,[s("div",J,[K,s("div",Q,[s("div",W,[s("div",X,[s("div",Y,[Z,i(s("input",{type:"password",class:"form-control",id:"password","onUpdate:modelValue":t[2]||(t[2]=o=>a(e).password=o)},null,512),[[u,a(e).password]]),i(s("div",{class:"invalid-feedback",style:{display:"block"}},v(a(e).errors.password),513),[[m,a(e).errors.password]])]),s("div",ss,[as,i(s("input",{type:"text",class:"form-control",id:"username","onUpdate:modelValue":t[3]||(t[3]=o=>a(e).username=o)},null,512),[[u,a(e).username]]),i(s("div",{class:"invalid-feedback",style:{display:"block"}},v(a(e).errors.username),513),[[m,a(e).errors.username]])])])])])])]),s("div",es,[s("button",{type:"submit",class:k(["btn btn-sm btn-primary",{"opacity-25":a(e).processing}]),disabled:a(e).processing}," Save Changes ",10,ts)])])])],40,P)])])])]),_:1})],64))}},ns=O(os,[["__scopeId","data-v-a1d6fd8b"]]);export{ns as default};
