import{u as c,o as a,g as d,d as e,f as _,h as n,l as i,b as l,x as y,F as u,s as b,t as f}from"./app.810ed7ca.js";const h={class:"modal fade",id:"employeeTypeModal",tabindex:"-1","aria-labelledby":"employeeTypeModal","aria-hidden":"true"},v={class:"modal-dialog"},M={class:"modal-content"},T=["onSubmit"],S=e("div",{class:"modal-header"},[e("h5",{class:"modal-title",id:"employeeTypeModal"}," Update Employment Type "),e("button",{type:"button",class:"btn-close","data-coreui-dismiss":"modal","aria-label":"Close"})],-1),g={class:"modal-body"},x={class:"row g-3"},E={class:"col-12"},U=e("label",{for:"trans_date",class:"form-label"}," Date ",-1),V={class:"col-12"},k=e("label",{for:"employee_status",class:"form-label"},"Employee Status",-1),w=["value"],B={class:"col-12"},D=e("label",{for:"comment",class:"form-label"}," Comment ",-1),F=e("div",{class:"modal-footer"},[e("button",{type:"submit",class:"btn btn-sm btn-primary"},"Update")],-1),N={__name:"EmployeeTypeModal",props:{employee_id:String,employment_types:Array},setup(m){const t=c({trans_date:"",employment_type:"",comment:"",employee_id:m.employee_id}),r=()=>{t.post(route("employee.typehistory.store"),{onSuccess:()=>{t.reset(["trans_date","employment_type","comment"]),$("#employeeTypeModal").modal("hide")}})};return(A,s)=>(a(),d("div",h,[e("div",v,[e("div",M,[e("form",{onSubmit:_(r,["prevent"])},[S,e("div",g,[e("div",x,[e("div",E,[U,n(e("input",{type:"date",class:"form-control",id:"trans_date","onUpdate:modelValue":s[0]||(s[0]=o=>l(t).trans_date=o)},null,512),[[i,l(t).trans_date]])]),e("div",V,[k,n(e("select",{class:"form-select",id:"employee_status","onUpdate:modelValue":s[1]||(s[1]=o=>l(t).employment_type=o)},[(a(!0),d(u,null,b(m.employment_types,(o,p)=>(a(),d("option",{key:p,value:o.id},f(o.title),9,w))),128))],512),[[y,l(t).employment_type]])]),e("div",B,[D,n(e("input",{type:"text",class:"form-control",id:"comment","onUpdate:modelValue":s[2]||(s[2]=o=>l(t).comment=o)},null,512),[[i,l(t).comment]])])])]),F],40,T)])])]))}};export{N as default};