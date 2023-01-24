import{u as v,j as f,o as d,g as i,d as e,f as h,h as a,x as p,b as o,F as u,s as y,v as c,t as n,l as k,n as g}from"./app.810ed7ca.js";const M={class:"modal fade",id:"createDeployementModal",tabindex:"-1","aria-labelledby":"createDeployementModal","aria-hidden":"true"},D={class:"modal-dialog modal-md"},S={class:"modal-content"},V=["onSubmit"],x=e("div",{class:"modal-header"},[e("h5",{class:"modal-title",id:"createDeployementModal"}," Add Deployment "),e("button",{type:"button",class:"btn-close","data-coreui-dismiss":"modal","aria-label":"Close"})],-1),F={class:"modal-body"},U={class:"row g-3"},w={class:"col-12"},B=e("label",{for:"employees",class:"form-label"}," Employees ",-1),C=["value"],E={class:"col-12"},L=e("label",{for:"trans_date",class:"form-label"}," Date ",-1),A={class:"col-12"},T=e("label",{for:"location",class:"form-label"}," Location ",-1),j=["value"],z={class:"col-12"},I=e("label",{for:"department",class:"form-label"},"Department",-1),J=["value"],N={class:"col-12"},q=e("label",{for:"position",class:"form-label"},"Job Title",-1),G=["value"],H={class:"modal-footer"},K=["disabled"],P={__name:"CreateDeployementModal",props:{props:Array},setup(m){const s=v({employees:"",trans_date:"",location:"",department:"",position:""}),_=()=>{console.log(s),s.post(route("deployment.store"),{onSuccess:()=>{s.reset("employees","trans_date","location","department","position"),$("#createDeployementModal").modal("hide")}})};return f(()=>{document.getElementById("employees").addEventListener("changed.coreui.multi-select",l=>{const t=l.value;s.employees=t})}),(b,l)=>(d(),i("div",M,[e("div",D,[e("div",S,[e("form",{onSubmit:h(_,["prevent"])},[x,e("div",F,[e("div",U,[e("div",w,[B,a(e("select",{class:"form-multi-select",id:"employees",multiple:"","data-coreui-search":"true","onUpdate:modelValue":l[0]||(l[0]=t=>o(s).employees=t)},[(d(!0),i(u,null,y(m.props.employees,(t,r)=>(d(),i("option",{key:r,value:t.id},n(t.firstname+" "+t.lastname),9,C))),128))],512),[[p,o(s).employees]]),a(e("div",{class:"invalid-feedback",style:{display:"block"}},n(o(s).errors.employees),513),[[c,o(s).errors.employees]])]),e("div",E,[L,a(e("input",{type:"date",class:"form-control",id:"trans_date","onUpdate:modelValue":l[1]||(l[1]=t=>o(s).trans_date=t)},null,512),[[k,o(s).trans_date]]),a(e("div",{class:"invalid-feedback",style:{display:"block"}},n(o(s).errors.trans_date),513),[[c,o(s).errors.trans_date]])]),e("div",A,[T,a(e("select",{class:"form-select",id:"location","onUpdate:modelValue":l[2]||(l[2]=t=>o(s).location=t)},[(d(!0),i(u,null,y(m.props.locations,(t,r)=>(d(),i("option",{key:r,value:t.id},n(t.title),9,j))),128))],512),[[p,o(s).location]]),a(e("div",{class:"invalid-feedback",style:{display:"block"}},n(o(s).errors.location),513),[[c,o(s).errors.location]])]),e("div",z,[I,a(e("select",{class:"form-select",id:"department","onUpdate:modelValue":l[3]||(l[3]=t=>o(s).department=t)},[(d(!0),i(u,null,y(m.props.departments,(t,r)=>(d(),i("option",{key:r,value:t.id},n(t.title),9,J))),128))],512),[[p,o(s).department]]),a(e("div",{class:"invalid-feedback",style:{display:"block"}},n(o(s).errors.department),513),[[c,o(s).errors.department]])]),e("div",N,[q,a(e("select",{class:"form-select",id:"position","onUpdate:modelValue":l[4]||(l[4]=t=>o(s).position=t)},[(d(!0),i(u,null,y(m.props.positions,(t,r)=>(d(),i("option",{key:r,value:t.id},n(t.title),9,G))),128))],512),[[p,o(s).position]]),a(e("div",{class:"invalid-feedback",style:{display:"block"}},n(o(s).errors.position),513),[[c,o(s).errors.position]])])])]),e("div",H,[e("button",{type:"submit",class:g(["btn btn-sm btn-primary",{"opacity-25":o(s).processing}]),disabled:o(s).processing}," Save Changes ",10,K)])],40,V)])])]))}};export{P as default};