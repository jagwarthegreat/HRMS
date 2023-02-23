import{u as b,o as d,g as c,d as e,f as p,h as l,l as n,b as t,v as r,t as i,y as v,F as k,x as y,n as f}from"./app.c4c2e632.js";const h={class:"modal fade",id:"createStockModal",tabindex:"-1","aria-labelledby":"createStockModal","aria-hidden":"true"},g={class:"modal-dialog"},S={class:"modal-content"},M=["onSubmit"],x=e("div",{class:"modal-header"},[e("h5",{class:"modal-title",id:"createStockModal"},"Add Stock"),e("button",{type:"button",class:"btn-close","data-coreui-dismiss":"modal","aria-label":"Close"})],-1),C={class:"modal-body"},F={class:"row g-3"},w={class:"col-12"},U=e("label",{for:"name",class:"form-label"},"Stock Name",-1),V={class:"col-12"},B=e("label",{for:"unit",class:"form-label"},"Unit",-1),A={class:"col-12"},D=e("label",{for:"client",class:"form-label"},"Category",-1),N=["value"],z={class:"modal-footer"},E=["disabled"],j={__name:"CreateStockModal",props:{categories:Array},setup(m){const s=b({name:"",unit:"",stock_category_id:""}),_=()=>{s.post(route("stock.store"),{onSuccess:()=>{s.reset("name"),s.reset("unit"),s.reset("stock_category_id"),$("#createStockModal").modal("hide")}})};return(L,a)=>(d(),c("div",h,[e("div",g,[e("div",S,[e("form",{onSubmit:p(_,["prevent"])},[x,e("div",C,[e("div",F,[e("div",w,[U,l(e("input",{type:"text",class:"form-control",id:"name","onUpdate:modelValue":a[0]||(a[0]=o=>t(s).name=o)},null,512),[[n,t(s).name]]),l(e("div",{class:"invalid-feedback",style:{display:"block"}},i(t(s).errors.name),513),[[r,t(s).errors.name]])]),e("div",V,[B,l(e("input",{type:"text",class:"form-control",id:"unit","onUpdate:modelValue":a[1]||(a[1]=o=>t(s).unit=o)},null,512),[[n,t(s).unit]]),l(e("div",{class:"invalid-feedback",style:{display:"block"}},i(t(s).errors.unit),513),[[r,t(s).errors.unit]])]),e("div",A,[D,l(e("select",{class:"form-select select2",id:"client","onUpdate:modelValue":a[2]||(a[2]=o=>t(s).stock_category_id=o)},[(d(!0),c(k,null,y(m.categories,(o,u)=>(d(),c("option",{key:u,value:o.id},i(o.name),9,N))),128))],512),[[v,t(s).stock_category_id]]),l(e("div",{class:"invalid-feedback",style:{display:"block"}},i(t(s).errors.stock_category_id),513),[[r,t(s).errors.stock_category_id]])])])]),e("div",z,[e("button",{type:"submit",class:f(["btn btn-sm btn-primary",{"opacity-25":t(s).processing}]),disabled:t(s).processing}," Save Changes ",10,E)])],40,M)])])]))}};export{j as default};
