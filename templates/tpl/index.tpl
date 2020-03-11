<{if $op == contact_form}>
  <{* contact.tpl *}>
  <{include file="tpl/contact_form.tpl"}>
<{else if $op == ok}>
  <{* ok.tpl *}>
  <{include file="tpl/ok.tpl"}>
<{else if $op == login_form}>
  <{* login_form.tpl *}>
  <{include file="tpl/login_form.tpl"}>
<{else if $op == reg_form}>
  <{* reg_form.tpl *}>
  <{include file="tpl/reg_form.tpl"}>
<{else if $op == news_list}>
  <{* news_list.tpl *}>
  <{include file="tpl/news_list.tpl"}>
<{else}>
  <{* body.tpl *}>
  <{include file="tpl/body.tpl"}>
<{/if}>