import app from 'flarum/admin/app';
import { ConfigureWithOAuthPage } from '@fof-oauth';

app.initializers.add('nodeloc/oauth-telegram', () => {
  console.log("test");
  app.extensionData.for('nodeloc-oauth-telegram').registerPage(ConfigureWithOAuthPage);
});
