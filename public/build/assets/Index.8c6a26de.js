import{u as v,o as _,g as u,a as d,b as e,w as c,F as x,H as g,d as s,L as m,e as p,k as y,f as w,h as b,l as h,p as S,q as C}from"./app.c4c2e632.js";import{_ as I}from"./AuthenticatedLayout.38b2fc2d.js";import{_ as k}from"./_plugin-vue_export-helper.cdc0426e.js";const o=a=>(S("data-v-44843db1"),a=a(),C(),a),V={class:"breadcrumb-item"},F=o(()=>s("li",{class:"breadcrumb-item active","aria-current":"page"}," Login Parameter ",-1)),L={key:0,class:"col-md-12 text-end mb-2"},N={class:"col-6"},A={class:"card mb-4"},B=o(()=>s("div",{class:"card-header"},"Area of Access",-1)),U={class:"card-body"},D=["onSubmit"],H={class:"row g-3"},M={class:"col-6"},P=o(()=>s("label",{for:"coordinates",class:"form-label"},"Coordinates",-1)),T={class:"col-6"},q=o(()=>s("label",{for:"radius",class:"form-label"},"Radius",-1)),E=o(()=>s("div",{class:"col-12"},[s("button",{type:"submit",class:"form-control btn btn-primary"}," Save Changes ")],-1)),R=o(()=>s("div",{class:"row"},[s("div",{class:"col-md-12"},[s("div",{id:"map_canvas"})])],-1)),$={__name:"Index",props:{aoa:Array},setup(a){const i=a,t=v({coordinates:i.aoa[0].coordinates,radius:i.aoa[0].radius}),f=()=>{t.post(route("aoa.update",i.aoa[0].id),{preserveScroll:!0,onSuccess:()=>{alert("Changes saved.")}})};return(n,r)=>(_(),u(x,null,[d(e(g),{title:"Login Parameter"}),d(I,null,{breadcrumbs:c(()=>[s("li",V,[d(e(m),{href:n.route("dashboard")},{default:c(()=>[p("Dashboard")]),_:1},8,["href"])]),F]),default:c(()=>[n.canCreate?(_(),u("div",L,[d(e(m),{class:"btn btn-dark btn-sm",href:n.route("user.create")},{default:c(()=>[p(" Create User ")]),_:1},8,["href"])])):y("",!0),s("div",N,[s("div",A,[B,s("div",U,[s("form",{onSubmit:w(f,["prevent"])},[s("div",H,[s("div",M,[P,b(s("input",{type:"text",class:"form-control",id:"coordinates","onUpdate:modelValue":r[0]||(r[0]=l=>e(t).coordinates=l)},null,512),[[h,e(t).coordinates]])]),s("div",T,[q,b(s("input",{type:"text",class:"form-control",id:"radius","onUpdate:modelValue":r[1]||(r[1]=l=>e(t).radius=l)},null,512),[[h,e(t).radius]])]),E])],40,D),R])])])]),_:1})],64))}},J=k($,[["__scopeId","data-v-44843db1"]]);export{J as default};